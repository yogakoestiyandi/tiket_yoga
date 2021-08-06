<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembayaran?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembayaran?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembayaran';
            $config['first_url'] = base_url() . 'pembayaran';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembayaran_model->total_rows($q);
        $pembayaran = $this->Pembayaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembayaran_data' => $pembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pembayaran' => '',
        ];

        $data['page'] = 'pembayaran/pembayaran_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pembayaran' => $row->id_pembayaran,
                'id_pemesanan' => $row->id_pemesanan,
                'metode' => $row->metode,
                'tanggal_bayar' => $row->tanggal_bayar,
                'status_bayar' => $row->status_bayar,
            );
            $data['title'] = 'Pembayaran';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'pembayaran/pembayaran_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/create_action'),
            'id_pembayaran' => set_value('id_pembayaran'),
            'id_pemesanan' => set_value('id_pemesanan'),
            'metode' => set_value('metode'),
            'tanggal_bayar' => set_value('tanggal_bayar'),
            'status_bayar' => set_value('status_bayar'),
        );
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pembayaran/pembayaran_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan', TRUE),
                'metode' => $this->input->post('metode', TRUE),
                'tanggal_bayar' => $this->input->post('tanggal_bayar', TRUE),
                'status_bayar' => $this->input->post('status_bayar', TRUE),
            );

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('pembayaran'));
        }
    }

    public function update($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran/update_action'),
                'id_pembayaran' => set_value('id_pembayaran', $row->id_pembayaran),
                'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
                'metode' => set_value('metode', $row->metode),
                'tanggal_bayar' => set_value('tanggal_bayar', $row->tanggal_bayar),
                'status_bayar' => set_value('status_bayar', $row->status_bayar),
            );
            $data['title'] = 'Pembayaran';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'pembayaran/pembayaran_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembayaran', TRUE));
        } else {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan', TRUE),
                'metode' => $this->input->post('metode', TRUE),
                'tanggal_bayar' => $this->input->post('tanggal_bayar', TRUE),
                'status_bayar' => $this->input->post('status_bayar', TRUE),
            );

            $this->Pembayaran_model->update($this->input->post('id_pembayaran', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('pembayaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Pembayaran_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_pemesanan', 'id pemesanan', 'trim|required');
        $this->form_validation->set_rules('metode', 'metode', 'trim|required');
        $this->form_validation->set_rules('tanggal_bayar', 'tanggal bayar', 'trim|required');
        $this->form_validation->set_rules('status_bayar', 'status bayar', 'trim|required');

        $this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function bayar($id_pemesanan)
    {
        $tiket = $this->db->query("SELECT j.harga_tiket,j.asal,j.tujuan from pemesanan p join jadwal j on p.id_jadwal = j.id_jadwal where p.id_pemesanan=$id_pemesanan")->row();
        $harga_tiket = $tiket->harga_tiket;
        $asal = $tiket->asal;
        $tujuan = $tiket->tujuan;
        $data = array(
            'button' => 'Bayar',
            'action' => site_url('pembayaran/bayar_action'),
            'id_pembayaran' => set_value('id_pembayaran'),
            'id_pemesanan' => $id_pemesanan,
            'metode' => set_value('metode'),
            'tanggal_bayar' => date('Y-m-d'),
            'status_bayar' => 'dibayar',
            'harga_tiket' => $harga_tiket,
            'asal' => $asal,
            'tujuan' => $tujuan,
        );
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pembayaran/pembayaran_form';
        $this->load->view('template/backend', $data);
    }

    public function bayar_action()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan', TRUE),
            'metode' => $this->input->post('metode', TRUE),
            'tanggal_bayar' => $this->input->post('tanggal_bayar', TRUE),
            'status_bayar' => $this->input->post('status_bayar', TRUE),
        );

        $id = $this->Pembayaran_model->insert($data);
        $this->session->set_flashdata('success', 'Create Record Success');
        redirect(site_url('pembayaran/bayar_sukses/' . $id));
    }

    public function bayar_sukses($id_bayar)
    {
        // Tanggal Keberangkatan, Nama, Jenis Kelamin,  Nomor Handphone , Harga
        $id_pemesanan = $this->db->query("SELECT id_pemesanan from pembayaran where id_pembayaran=$id_bayar")->row();
        $id_pemesanan = $id_pemesanan->id_pemesanan;

        $detail = $this->db->query("SELECT * from detail_pemesanan where id_pemesanan=$id_pemesanan")->row();
        $nama = $detail->nama;
        $jenis_kelamin = $detail->jenis_kelamin;
        $nomor_hp = $detail->nomor_hp;

        $jadwal = $this->db->query("SELECT jadwal.tanggal_keberangkatan,jadwal.harga_tiket from pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id_jadwal where id_pemesanan=$id_pemesanan")->row();
        $tanggal_keberangkatan = $jadwal->tanggal_keberangkatan;
        $harga_tiket = $jadwal->harga_tiket;

        $data = array(
            'button' => 'Bayar',
            'action' => site_url('pembayaran/cetak_tiket/' . $id_bayar),
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'nomor_hp' => $nomor_hp,
            'tanggal_keberangkatan' => $tanggal_keberangkatan,
            'harga_tiket' => $harga_tiket,
            'id_pemesanan' => $id_pemesanan,

        );
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pembayaran/bayar_sukses';
        $this->load->view('template/backend', $data);
    }

    public function cetak_tiket($id_bayar)
    {
        // Tanggal Keberangkatan, Nama, Jenis Kelamin,  Nomor Handphone , Harga
        $id_pemesanan = $this->db->query("SELECT id_pemesanan from pembayaran where id_pembayaran=$id_bayar")->row();
        $id_pemesanan = $id_pemesanan->id_pemesanan;

        $detail = $this->db->query("SELECT * from detail_pemesanan where id_pemesanan=$id_pemesanan")->row();
        $nama = $detail->nama;
        $jenis_kelamin = $detail->jenis_kelamin;
        $nomor_hp = $detail->nomor_hp;

        $jadwal = $this->db->query("SELECT jadwal.tanggal_keberangkatan,jadwal.harga_tiket from pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id_jadwal where id_pemesanan=$id_pemesanan")->row();
        $tanggal_keberangkatan = $jadwal->tanggal_keberangkatan;
        $harga_tiket = $jadwal->harga_tiket;

        $data = array(
            'button' => 'Bayar',
            'action' => site_url('pembayaran/cetak_tiket'),
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'nomor_hp' => $nomor_hp,
            'tanggal_keberangkatan' => $tanggal_keberangkatan,
            'harga_tiket' => $harga_tiket,
            'id_pemesanan' => $id_pemesanan,

        );
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pembayaran/bayar_sukses_print';
        $this->load->view('template/backend', $data);
    }

    public function cetak_tiket_pemesanan($id_pemesanan)
    {
        // Tanggal Keberangkatan, Nama, Jenis Kelamin,  Nomor Handphone , Harga


        $detail = $this->db->query("SELECT * from detail_pemesanan where id_pemesanan=$id_pemesanan")->row();
        $nama = $detail->nama;
        $jenis_kelamin = $detail->jenis_kelamin;
        $nomor_hp = $detail->nomor_hp;

        $jadwal = $this->db->query("SELECT jadwal.tanggal_keberangkatan,jadwal.harga_tiket from pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id_jadwal where id_pemesanan=$id_pemesanan")->row();
        $tanggal_keberangkatan = $jadwal->tanggal_keberangkatan;
        $harga_tiket = $jadwal->harga_tiket;

        $data = array(
            'button' => 'Bayar',
            'action' => site_url('pembayaran/cetak_tiket'),
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'nomor_hp' => $nomor_hp,
            'tanggal_keberangkatan' => $tanggal_keberangkatan,
            'harga_tiket' => $harga_tiket,
            'id_pemesanan' => $id_pemesanan,

        );
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pembayaran/bayar_sukses_print';
        $this->load->view('template/backend', $data);
    }
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-29 10:54:03 */
/* http://harviacode.com */