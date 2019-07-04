<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pulsa_model extends CI_Model
{
    private $_table = "trans_detail";
    private $_view = "history";

    public $id_detail;
    public $id_trans;
    public $nomor;
    public $nomor2;
    public $id_operator;
    public $id_nominal;
    public $status;

    public function rules()
    {
        return [


            [
                'field' => 'nomor',
                'label' => 'nomor',
                'rules' => 'required'
            ],


        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }


    public function getView()
    {
        return $this->db->get($this->_view)->result();
    }


    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_detail" => $id])->row();
    }



    public function save()
    {
        $ip = "192.168.43.1";
        $port = "8000";

        //ping server SMSGateway
        exec("ping -n 3 $ip", $output, $status);

        $ping = $output[2];
        $stat = explode(":", $ping);

        // cek status transaksi
        if ($status == 0) {
            if ($stat[1] != " Destination host unreachable.") {
                $status = "BERHASIL";
                $this->session->set_flashdata('success', 'Transaksi Berhasil');
            } else {
                $status = "GAGAL";
                $this->session->set_flashdata('danger', 'Transaksi Gagal');
            };
        } else {
            $status = "GAGAL";
            $this->session->set_flashdata('danger', 'Transaksi Gagal');
        };

        $kode = uniqid(6);
        $forign = uniqid(10);

        $post = $this->input->post();
        $tanggal = $post["tanggal"];

        $data = array(

            'id_trans'      => $forign,
            'tanggal'     => $tanggal

        );
        $this->db->insert('trans', $data);



        $this->id_detail = $kode;
        $this->id_trans = $forign;
        $this->id_operator = $post["id_operator"];
        $this->nomor = $post["nomor"];
        $this->nomor2 = $post["nomor2"];
        $this->id_nominal = $post["id_nominal"];
        $this->status = $status;
        $this->db->insert($this->_table, $this);



        // inisialisasi nama operator
        if ($post["id_operator"] == 1) {
            $operator = "Telkomsel";
        }
        if ($post["id_operator"] == 2) {
            $operator = "XL Axiata";
        }
        if ($post["id_operator"] == 3) {
            $operator = "Tri";
        }
        if ($post["id_operator"] == 4) {
            $operator = "Indosat";
        }


        //===============================================================
        //===============================================================
        // inisialisasi jumlah pulsa            
        if ($post["id_nominal"] == 1) {
            $nominal = "5.000";
        }
        if ($post["id_nominal"] == 2) {
            $nominal = "10.000";
        }
        if ($post["id_nominal"] == 3) {
            $nominal = "25.000";
        }
        if ($post["id_nominal"] == 4) {
            $nominal = "50.000";
        }
        if ($post["id_nominal"] == 5) {
            $nominal = "100.000";
        }


        //membuat JSON nomor dan pesan
        $data = array("no" => $post["nomor"], "pesan" => "Pelanggan Yth, Isi Pulsa " . $operator . " senilai Rp." . $nominal . " SUKSES, Kode: " . $kode . ". Isi ulang terus untuk memperpanjang masa aktiv nomor kamu");
        $data_string = json_encode($data);

        //cek apakah jika transaksi BERHASIL maka akan mengirim JSON data ke SMSGateway Server
        if ($status == "BERHASIL") {
            $ch = curl_init('http://' . $ip . ':' . $port . '');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Length: ' . strlen($data_string)
                )
            );

            $result = curl_exec($ch);
        }



        //==============================================================================
        //=========================    MENGIRIM KE NOMOR KE-2   ========================
        //==============================================================================


        $ceknomor2 = $this->db->get_where('trans_detail', array('nomor2' => $post["nomor2"]));

        if ($ceknomor2->num_rows() > 0) {
            $data2 = array("no" => $post["nomor2"], "pesan" => "Pelanggan Yth, Isi Pulsa " . $operator . " senilai Rp." . $nominal . " SUKSES, Kode: " . $kode . ". Isi ulang terus untuk memperpanjang masa aktiv nomor kamu");
            $data_string2 = json_encode($data2);

            //cek apakah jika transaksi BERHASIL maka akan mengirim JSON data ke SMSGateway Server
            if ($status == "BERHASIL") {
                $ch2 = curl_init('http://' . $ip . ':' . $port . '');
                curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_string2);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch2,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Length: ' . strlen($data_string2)
                    )
                );

                $result2 = curl_exec($ch2);
            }
        }
    }
}
