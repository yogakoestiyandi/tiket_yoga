<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penumpang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Penumpang_model');
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'penumpang?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penumpang?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penumpang';
            $config['first_url'] = base_url() . 'penumpang';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penumpang_model->total_rows($q);
        $penumpang = $this->Penumpang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penumpang_data' => $penumpang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Penumpang';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Penumpang' => '',
        ];

        $data['page'] = 'penumpang/penumpang_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Penumpang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_penumpang' => $row->id_penumpang,
                'id_user' => $row->id_user,
                'alamat' => $row->alamat,
                'jens_kelamin' => $row->jens_kelamin,
                'nomor_hp' => $row->nomor_hp,
            );
            $data['title'] = 'Penumpang';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'penumpang/penumpang_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penumpang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penumpang/create_action'),
            'id_penumpang' => set_value('id_penumpang'),
            'id_user' => set_value('id_user'),
            'alamat' => set_value('alamat'),
            'jens_kelamin' => set_value('jens_kelamin'),
            'nomor_hp' => set_value('nomor_hp'),
        );
        $data['title'] = 'Penumpang';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'penumpang/penumpang_form';
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
                'alamat' => $this->input->post('alamat', TRUE),
                'jens_kelamin' => $this->input->post('jens_kelamin', TRUE),
                'nomor_hp' => $this->input->post('nomor_hp', TRUE),
            );

            $this->Penumpang_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('penumpang'));
        }
    }

    public function update($id)
    {
        $row = $this->Penumpang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penumpang/update_action'),
                'id_penumpang' => set_value('id_penumpang', $row->id_penumpang),
                'id_user' => set_value('id_user', $row->id_user),
                'alamat' => set_value('alamat', $row->alamat),
                'jens_kelamin' => set_value('jens_kelamin', $row->jens_kelamin),
                'nomor_hp' => set_value('nomor_hp', $row->nomor_hp),
            );
            $data['title'] = 'Penumpang';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'penumpang/penumpang_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penumpang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penumpang', TRUE));
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'jens_kelamin' => $this->input->post('jens_kelamin', TRUE),
                'nomor_hp' => $this->input->post('nomor_hp', TRUE),
            );

            $this->Penumpang_model->update($this->input->post('id_penumpang', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('penumpang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Penumpang_model->get_by_id($id);

        if ($row) {
            $this->Penumpang_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('penumpang'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penumpang'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Penumpang_model->deletebulk();
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
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('jens_kelamin', 'jens kelamin', 'trim|required');
        $this->form_validation->set_rules('nomor_hp', 'nomor hp', 'trim|required');

        $this->form_validation->set_rules('id_penumpang', 'id_penumpang', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function data_saya()
    {
        $id_user = $this->ion_auth->user()->row();
        $row = $this->Penumpang_model->get_by_id($id_user->id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('penumpang/data_saya_action'),
                'id_penumpang' => set_value('id_penumpang', $row->id_penumpang),
                'nama_awal' => set_value('nama_awal', $id_user->first_name),
                'nama_akhir' => set_value('nama_akhir', $id_user->last_name),
                'id_user' => set_value('id_user', $row->id_user),
                'alamat' => set_value('alamat', $row->alamat),
                'jens_kelamin' => set_value('jens_kelamin', $row->jens_kelamin),
                'nomor_hp' => set_value('nomor_hp', $row->nomor_hp),
            );
            $data['title'] = 'Data Saya';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'penumpang/penumpang_data';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('dashboard'));
        }
    }

    public function data_saya_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penumpang', TRUE));
        } else {

            $data = array(
                'first_name' => $this->input->post('nama_awal', TRUE),
                'last_name' => $this->input->post('nama_akhir', TRUE),
            );

            $this->Users_model->update($this->input->post('id_user', TRUE), $data);

            $data = array(
                'alamat' => $this->input->post('alamat', TRUE),
                'jens_kelamin' => $this->input->post('jens_kelamin', TRUE),
                'nomor_hp' => $this->input->post('nomor_hp', TRUE),
            );

            $this->Penumpang_model->update($this->input->post('id_penumpang', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('penumpang/data_saya'));
        }
    }
}

/* End of file Penumpang.php */
/* Location: ./application/controllers/Penumpang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-29 10:53:48 */
/* http://harviacode.com */