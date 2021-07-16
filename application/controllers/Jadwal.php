<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jadwal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'jadwal?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jadwal?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jadwal';
            $config['first_url'] = base_url() . 'jadwal';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jadwal_model->total_rows($q);
        $jadwal = $this->Jadwal_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jadwal_data' => $jadwal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Jadwal';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jadwal' => '',
        ];

        $data['page'] = 'jadwal/jadwal_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_jadwal' => $row->id_jadwal,
                'asal' => $row->asal,
                'tujuan' => $row->tujuan,
                'tanggal_keberangkatan' => $row->tanggal_keberangkatan,
                'tanggal_sampai' => $row->tanggal_sampai,
                'harga_tiket' => $row->harga_tiket,
            );
            $data['title'] = 'Jadwal';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'jadwal/jadwal_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('jadwal/create_action'),
            'id_jadwal' => set_value('id_jadwal'),
            'asal' => set_value('asal'),
            'tujuan' => set_value('tujuan'),
            'tanggal_keberangkatan' => set_value('tanggal_keberangkatan'),
            'tanggal_sampai' => set_value('tanggal_sampai'),
            'harga_tiket' => set_value('harga_tiket'),
        );
        $data['title'] = 'Jadwal';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jadwal/jadwal_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'asal' => $this->input->post('asal', TRUE),
                'tujuan' => $this->input->post('tujuan', TRUE),
                'tanggal_keberangkatan' => $this->input->post('tanggal_keberangkatan', TRUE),
                'tanggal_sampai' => $this->input->post('tanggal_sampai', TRUE),
                'harga_tiket' => $this->input->post('harga_tiket', TRUE),
            );

            $this->Jadwal_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('jadwal'));
        }
    }

    public function update($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jadwal/update_action'),
                'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
                'asal' => set_value('asal', $row->asal),
                'tujuan' => set_value('tujuan', $row->tujuan),
                'tanggal_keberangkatan' => set_value('tanggal_keberangkatan', $row->tanggal_keberangkatan),
                'tanggal_sampai' => set_value('tanggal_sampai', $row->tanggal_sampai),
                'harga_tiket' => set_value('harga_tiket', $row->harga_tiket),
            );
            $data['title'] = 'Jadwal';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'jadwal/jadwal_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal', TRUE));
        } else {
            $data = array(
                'asal' => $this->input->post('asal', TRUE),
                'tujuan' => $this->input->post('tujuan', TRUE),
                'tanggal_keberangkatan' => $this->input->post('tanggal_keberangkatan', TRUE),
                'tanggal_sampai' => $this->input->post('tanggal_sampai', TRUE),
                'harga_tiket' => $this->input->post('harga_tiket', TRUE),
            );

            $this->Jadwal_model->update($this->input->post('id_jadwal', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('jadwal'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $this->Jadwal_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('jadwal'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Jadwal_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('asal', 'asal', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
        $this->form_validation->set_rules('tanggal_keberangkatan', 'tanggal keberangkatan', 'trim|required');
        $this->form_validation->set_rules('tanggal_sampai', 'tanggal sampai', 'trim|required');
        $this->form_validation->set_rules('harga_tiket', 'harga tiket', 'trim|required');

        $this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-03 02:32:06 */
/* http://harviacode.com */