<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoM extends Model
{
    protected $table = 'video';
    protected $allowedFields = array('users_id', 'judul', 'deskripsi', 'link', 'status');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'users_id' => 'max_length[6]',
        'judul' => 'required|max_length[150]',
        'deskripsi' => 'required',
        'link' => 'required|max_length[255]',
        'status' => 'required|max_length[1]',
    ];

    protected $validationMessages = [
        'users_id' => ['max_length' => 'Maximal 6 Karakter'],
        'judul' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
        'deskripsi' => ['required' => 'tidak boleh kosong'],
        'link' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 255 Karakter'],
        'status' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 1 Karakter'],
    ];
    private function _get_datatables()
    {
        $column_search = array('users_id', 'judul', 'deskripsi', 'link', 'status');
        $i = 0;
        foreach ($column_search as $item) { // loop column 
            if ($_GET['search']) {
                if ($i === 0) {
                    $this->groupStart();
                    $this->like($item, $_GET['search']);
                } else {
                    $this->orLike($item, $_GET['search']);
                }
                if (count($column_search) - 1 == $i)
                    $this->groupEnd();
            }
            $i++;
        }
        if (isset($_GET['order'])) {
            $this->orderBy($_GET['sort'], $_GET['order']);
        } else {
            $this->orderBy('id', 'asc');
        }

        if (!in_groups(2)) {
            $this->where('users_id', session('user_id'));
        }
        $this->select('video.*,u.nama_user');
        $this->join('users u', 'u.id=video.users_id');
    }
    public function get_datatables()
    {
        $this->_get_datatables();
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        return $this->findAll($limit, $offset);
    }
    public function total()
    {
        $this->_get_datatables();
        if ($this->tempUseSoftDeletes) {
            $this->where($this->table . '.' . $this->deletedField, null);
        }
        if (!in_groups(2)) {
            $this->where('users_id', session('user_id'));
        }
        return $this->get()->getNumRows();
    }

    public function joinUsers()
    {
        return $this->join('users u', 'u.id=users_id');
    }
}
/* End of file VideoM.php */
/* Location: ./app/models/VideoM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-07 08:34:26 */