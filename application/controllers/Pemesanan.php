<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pemesanan_model');
        $this->load->model('Detail_pemesanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan';
            $config['first_url'] = base_url() . 'pemesanan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemesanan_model->total_rows($q);
        $pemesanan = $this->Pemesanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesanan_data' => $pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pemesanan' => '',
        ];

        $data['page'] = 'pemesanan/pemesanan_list';
        $this->load->view('template/backend', $data);
    }

    public function pemesanan_penumpang()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan/pemesanan_penumpang?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan/pemesanan_penumpang?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan/pemesanan_penumpang';
            $config['first_url'] = base_url() . 'pemesanan/pemesanan_penumpang';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $id_user = $this->ion_auth->user()->row();
        $id_user = $id_user->id;
        $config['total_rows'] = $this->Pemesanan_model->total_rows_penumpang($q, $id_user);
        $pemesanan = $this->Pemesanan_model->get_limit_data_penumpang($config['per_page'], $start, $q, $id_user);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesanan_data' => $pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pemesanan' => '',
        ];

        $data['page'] = 'pemesanan/pemesanan_list';
        $this->load->view('template/backend', $data);
    }
    public function pemesanan_kasir()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan/pemesanan_kasir?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan/pemesanan_kasir?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan/pemesanan_kasir';
            $config['first_url'] = base_url() . 'pemesanan/pemesanan_kasir';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        // $config['total_rows'] = $this->Pemesanan_model->total_rows_kasir($q);
        $id_user = $this->ion_auth->user()->row();
        $id_user = $id_user->id;
        $config['total_rows'] = $this->Pemesanan_model->total_rows_penumpang($q, $id_user);
        $pemesanan = $this->Pemesanan_model->get_limit_data_kasir($config['per_page'], $start, $q, $id_user);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesanan_data' => $pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pemesanan' => '',
        ];

        $data['page'] = 'pemesanan/pemesanan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id_pemesanan)
    {
        $detail = $this->db->query("SELECT * from detail_pemesanan where id_pemesanan=$id_pemesanan")->row();
        $nama = $detail->nama;
        $jenis_kelamin = $detail->jenis_kelamin;
        $nomor_hp = $detail->nomor_hp;

        $jadwal = $this->db->query("SELECT jadwal.tanggal_keberangkatan,jadwal.harga_tiket from pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id_jadwal where id_pemesanan=$id_pemesanan")->row();
        $tanggal_keberangkatan = $jadwal->tanggal_keberangkatan;
        $harga_tiket = $jadwal->harga_tiket;
        $row = $this->Pemesanan_model->get_by_id($id_pemesanan);
        $jadwalKeberangkatan = $this->db->query("select concat(asal,'-',tujuan) as jadwal from jadwal where id_jadwal=$row->id_jadwal")->row();
        $jadwalKeberangkatan = $jadwalKeberangkatan->jadwal;
        if ($row) {
            $data = array(
                'nama' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'nomor_hp' => $nomor_hp,
                'tanggal_keberangkatan' => $tanggal_keberangkatan,
                'harga_tiket' => $harga_tiket,
                'id_pemesanan' => $row->id_pemesanan,
                'id_user' => $row->id_user,
                'jadwal' => $jadwalKeberangkatan,
                'id_jadwal' => $row->id_jadwal,
                'status_pemesanan' => $row->status_pemesanan,
                'tanggal_pemesanan' => $row->tanggal_pemesanan,
            );
            $data['title'] = 'Pemesanan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'pemesanan/pemesanan_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemesanan/create_action'),
            'id_pemesanan' => set_value('id_pemesanan'),
            'id_user' => set_value('id_user'),
            'id_jadwal' => set_value('id_jadwal'),
            'status_pemesanan' => set_value('status_pemesanan'),
            'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pemesanan/pemesanan_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'id_jadwal' => $this->input->post('id_jadwal', TRUE),
                'status_pemesanan' => $this->input->post('status_pemesanan', TRUE),
                'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan', TRUE),
            );

            $this->Pemesanan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('pemesanan'));
        }
    }

    public function update($id)
    {
        $row = $this->Pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemesanan/update_action'),
                'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
                'id_user' => set_value('id_user', $row->id_user),
                'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
                'status_pemesanan' => set_value('status_pemesanan', $row->status_pemesanan),
                'tanggal_pemesanan' => set_value('tanggal_pemesanan', $row->tanggal_pemesanan),
            );
            $data['title'] = 'Pemesanan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'pemesanan/pemesanan_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemesanan', TRUE));
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'id_jadwal' => $this->input->post('id_jadwal', TRUE),
                'status_pemesanan' => $this->input->post('status_pemesanan', TRUE),
                'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan', TRUE),
            );

            $this->Pemesanan_model->update($this->input->post('id_pemesanan', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('pemesanan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Pemesanan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('pemesanan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Pemesanan_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        $this->form_validation->set_rules('id_jadwal', 'id jadwal', 'trim|required');
        $this->form_validation->set_rules('status_pemesanan', 'status pemesanan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemesanan', 'tanggal pemesanan', 'trim|required');

        $this->form_validation->set_rules('id_pemesanan', 'id_pemesanan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function penumpang_pesan()
    {
        $id_user = $this->ion_auth->user()->row();
        $data = array(
            'button' => 'Pesan Tiket',
            'action' => site_url('pemesanan/penumpang_pesan2'),
            'id_pemesanan' => set_value('id_pemesanan'),
            'id_user' => set_value('id_user', $id_user->id),
            'id_jadwal' => set_value('id_jadwal'),
            'status_pemesanan' => set_value('status_pemesanan'),
            'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
        );
        $data['jadwal_kapal'] = $this->db->query("SELECT * from jadwal")->result();

        $data['title'] = 'Pemesanan Tiket';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pemesanan/pemesanan_penumpang';
        $this->load->view('template/backend', $data);
    }

    public function penumpang_pesan2()
    {
        $id_user = $this->input->post('id_user', TRUE);
        $penumpang = $this->db->query("SELECT * from penumpang where id_user=$id_user")->row();


        if ($penumpang) {
            $id_penumpang = $penumpang->id_penumpang;
            $alamat = $penumpang->alamat;
            $nomor_hp = $penumpang->nomor_hp;
        }

        $data = array(
            'button' => 'Pesan Tiket',
            'action' => site_url('pemesanan/penumpang_pesan_action'),
            'id_user' => $id_user,
            'id_jadwal' => $this->input->post('id_jadwal', TRUE),
            'status_pemesanan' => "Dipesan",
            'tanggal_pemesanan' => date('Y-m-d'),
            'alamat' => $alamat,
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'nama' => set_value('nama'),
            'nomor_hp' => $nomor_hp,
        );
        $data['title'] = 'Pemesanan Tiket';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $data['page'] = 'penumpang/penumpang_pesan';
        $this->load->view('template/backend', $data);
    }
    public function penumpang_pesan_action()
    {

        $pemesanan = array(
            'id_user' => $this->input->post('id_user', TRUE),
            'id_jadwal' => $this->input->post('id_jadwal', TRUE),
            'status_pemesanan' => "Dipesan",
            'tanggal_pemesanan' => date('Y-m-d'),
        );

        $id_pemesanan = $this->Pemesanan_model->insert($pemesanan);

        $detail = array(
            // 'id_jadwal' => $this->input->post('id_jadwal', TRUE),
            'id_pemesanan' => $id_pemesanan,
            'nama' => $this->input->post('nama', TRUE),
            'nomor_hp' => $this->input->post('nomor_hp', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
        );
        $this->Detail_pemesanan_model->insert($detail);
        $this->session->set_flashdata('success', 'Create Record Success');
        redirect(site_url('pembayaran/bayar/') . $id_pemesanan);
    }


    public function kasir_pesan()
    {
        $id_user = $this->ion_auth->user()->row();
        $data = array(
            'button' => 'Pesan Tiket',
            'action' => site_url('pemesanan/kasir_pesan2'),
            'id_pemesanan' => set_value('id_pemesanan'),
            'id_user' => set_value('id_user', $id_user->id),
            'id_jadwal' => set_value('id_jadwal'),
            'status_pemesanan' => set_value('status_pemesanan'),
            'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
        );
        $data['jadwal_kapal'] = $this->db->query("SELECT * from jadwal")->result();

        $data['title'] = 'Pemesanan Tiket';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pemesanan/pemesanan_kasir';
        $this->load->view('template/backend', $data);
    }

    public function kasir_pesan2()
    {
        $id_user = $this->input->post('id_user', TRUE);
        // $alamat = $this->input->post('alamat', TRUE);
        // $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
        // $nama = $this->input->post('nama', TRUE);
        // $nomor_hp = $this->input->post('nomor_hp', TRUE);
        // $kasir = $this->db->query("SELECT * from kasir where id_user=$id_user")->row();


        // if ($kasir) {
        //     $id_kasir = $kasir->id_kasir;
        //     $alamat = $kasir->alamat;
        //     $nomor_hp = $kasir->nomor_hp;
        // }

        $data = array(
            'button' => 'Pesan Tiket',
            'action' => site_url('pemesanan/kasir_pesan_action'),
            'id_user' => $id_user,
            'id_jadwal' => $this->input->post('id_jadwal', TRUE),
            'status_pemesanan' => "Dipesan",
            'tanggal_pemesanan' => date('Y-m-d'),
            'alamat' => set_value('alamat'),
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'nama' => set_value('nama'),
            'nomor_hp' => set_value('nomor_hp'),
        );
        $data['title'] = 'Pemesanan Tiket';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $data['page'] = 'kasir/kasir_pesan';
        $this->load->view('template/backend', $data);
    }
    public function kasir_pesan_action()
    {

        $pemesanan = array(
            'id_user' => $this->input->post('id_user', TRUE),
            'id_jadwal' => $this->input->post('id_jadwal', TRUE),
            'status_pemesanan' => "Dipesan",
            'tanggal_pemesanan' => date('Y-m-d'),
        );

        $id_pemesanan = $this->Pemesanan_model->insert($pemesanan);

        $detail = array(
            // 'id_jadwal' => $this->input->post('id_jadwal', TRUE),
            'id_pemesanan' => $id_pemesanan,
            'nama' => $this->input->post('nama', TRUE),
            'nomor_hp' => $this->input->post('nomor_hp', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
        );
        $this->Detail_pemesanan_model->insert($detail);
        $this->session->set_flashdata('success', 'Create Record Success');
        redirect(site_url('pembayaran/bayar/') . $id_pemesanan);
    }
}



/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-03 02:35:23 */
/* http://harviacode.com */