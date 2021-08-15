<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Laporan_pemesanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_pemesanan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_pemesanan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_pemesanan';
            $config['first_url'] = base_url() . 'laporan_pemesanan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_pemesanan_model->total_rows($q);
        $laporan_pemesanan = $this->Laporan_pemesanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_pemesanan_data' => $laporan_pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Laporan Pemesanan' => '',
        ];

        $data['jadwal_keberangkatan'] = $this->db->query("select * from jadwal order by tanggal_keberangkatan desc")->result();

        $data['page'] = 'laporan_pemesanan/laporan_pemesanan_list';
        $this->load->view('template/backend', $data);
    }
    public function tanggal()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_pemesanan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_pemesanan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_pemesanan';
            $config['first_url'] = base_url() . 'laporan_pemesanan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;


        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        if ($dari) {
            $config['total_rows'] = $this->Laporan_pemesanan_model->total_rows_tanggal($q, $dari, $sampai);
            $laporan_pemesanan = $this->Laporan_pemesanan_model->get_limit_data_tanggal($config['per_page'], $start, $q, $dari, $sampai);
        } else {
            $config['total_rows'] = $this->Laporan_pemesanan_model->total_rows($q);
            $laporan_pemesanan = $this->Laporan_pemesanan_model->get_limit_data($config['per_page'], $start, $q);
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_pemesanan_data' => $laporan_pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Laporan Pemesanan' => '',
        ];

        $data['jadwal_keberangkatan'] = $this->db->query("select * from jadwal order by tanggal_keberangkatan desc")->result();

        $data['page'] = 'laporan_pemesanan/laporan_pemesanan_list';
        $this->load->view('template/backend', $data);
    }
    public function tujuan()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_pemesanan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_pemesanan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_pemesanan';
            $config['first_url'] = base_url() . 'laporan_pemesanan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;

        $id_jadwal = $this->input->post('id_jadwal');

        if ($id_jadwal) {
            $config['total_rows'] = $this->Laporan_pemesanan_model->total_rows_tujuan($q, $id_jadwal);
            $laporan_pemesanan = $this->Laporan_pemesanan_model->get_limit_data_tujuan($config['per_page'], $start, $q, $id_jadwal);
        } else {
            $config['total_rows'] = $this->Laporan_pemesanan_model->total_rows($q);
            $laporan_pemesanan = $this->Laporan_pemesanan_model->get_limit_data($config['per_page'], $start, $q);
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_pemesanan_data' => $laporan_pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Laporan Pemesanan' => '',
        ];

        $data['jadwal_keberangkatan'] = $this->db->query("select * from jadwal order by tanggal_keberangkatan desc")->result();

        $data['page'] = 'laporan_pemesanan/laporan_pemesanan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Laporan_pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'tanggal' => $row->tanggal,
                'id_jadwal' => $row->id_jadwal,
                'tiket_terjual' => $row->tiket_terjual,
            );
            $data['title'] = 'Laporan Pemesanan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'laporan_pemesanan/laporan_pemesanan_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_pemesanan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_pemesanan/create_action'),
            'tanggal' => set_value('tanggal'),
            'id_jadwal' => set_value('id_jadwal'),
            'tiket_terjual' => set_value('tiket_terjual'),
        );
        $data['title'] = 'Laporan Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan_pemesanan/laporan_pemesanan_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal', TRUE),
                'id_jadwal' => $this->input->post('id_jadwal', TRUE),
                'tiket_terjual' => $this->input->post('tiket_terjual', TRUE),
            );

            $this->Laporan_pemesanan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('laporan_pemesanan'));
        }
    }

    public function update($id)
    {
        $row = $this->Laporan_pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_pemesanan/update_action'),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
                'tiket_terjual' => set_value('tiket_terjual', $row->tiket_terjual),
            );
            $data['title'] = 'Laporan Pemesanan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'laporan_pemesanan/laporan_pemesanan_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_pemesanan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal', TRUE),
                'id_jadwal' => $this->input->post('id_jadwal', TRUE),
                'tiket_terjual' => $this->input->post('tiket_terjual', TRUE),
            );

            $this->Laporan_pemesanan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('laporan_pemesanan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Laporan_pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Laporan_pemesanan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('laporan_pemesanan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_pemesanan'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Laporan_pemesanan_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('id_jadwal', 'id jadwal', 'trim|required');
        $this->form_validation->set_rules('tiket_terjual', 'tiket terjual', 'trim|required');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "laporan_pemesanan.xls";
        $judul = "laporan_pemesanan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Jadwal");
        xlsWriteLabel($tablehead, $kolomhead++, "Tiket Terjual");

        foreach ($this->Laporan_pemesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_jadwal);
            xlsWriteLabel($tablebody, $kolombody++, $data->tiket_terjual);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=laporan_pemesanan.doc");

        $data = array(
            'laporan_pemesanan_data' => $this->Laporan_pemesanan_model->get_all(),
            'start' => 0
        );

        $this->load->view('laporan_pemesanan/laporan_pemesanan_doc', $data);
    }

    public function printdoc()
    {
        $data = array(
            'laporan_pemesanan_data' => $this->Laporan_pemesanan_model->get_all(),
            'start' => 0
        );
        $this->load->view('laporan_pemesanan/laporan_pemesanan_print', $data);
    }
}

/* End of file Laporan_pemesanan.php */
/* Location: ./application/controllers/Laporan_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-15 16:04:49 */
/* http://harviacode.com */