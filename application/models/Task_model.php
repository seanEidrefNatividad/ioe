<?php

class Task_model extends CI_Model
{
    public function getProfile($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');

        $this->db->where('ID', $user_id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function pendingTask()
    {
        $this->db->select('*');
        $this->db->from('tasks AS a');
        $this->db->where('a.Status', 'Pending');
        $this->db->where('a.User_ID', 0);

        // $this->db->group_by('a.task_ID');
        // $this->db->where('a.User_ID', $user_id);

        $query = $this->db->get();;
        return $query->result_array();
    }

    // public function onGoingTask()
    public function onGoingTask($user_id)
    {
        $this->db->select('*');
        $this->db->from('tasks AS a');

        $this->db->join('users as b', 'a.User_ID = b.ID', 'left');

        $this->db->where('a.Status', 'OnGoing');
        $this->db->where('a.User_ID', $user_id);

        $this->db->group_by('a.task_ID');

        $query = $this->db->get();;
        return $query->result_array();
    }
    public function completedTask($user_id)
    {
        $this->db->select('*');
        $this->db->from('tasks AS a');

        $this->db->join('users as b', 'a.User_ID = b.ID', 'left');

        $this->db->where('a.Status', 'Completed');
        $this->db->where('a.User_ID', $user_id);

        $query = $this->db->get();;
        return $query->result_array();
    }
    public function completedTaskDevice($device_id)
    {
        $this->db->select('*');
        $this->db->from('tasks AS a');

        $this->db->join('device as b', 'b.Device_ID = a.ID', 'left');

        $this->db->where('a.Status', 'Completed');
        $this->db->where('b.Device_ID', $device_id);

        $query = $this->db->get();;
        return $query->result_array();
    }

    public function updateStatus($id, $data)
    {
        $this->db->where('task_ID', $id);
        // $this->db->where('User_ID', $data['User_ID']);
        $this->db->update('tasks', $data);
    }
    public function updateStatusDevice($id, $data)
    {
        $this->db->where('ID', $id);
        // $this->db->where('User_ID', $data['User_ID']);
        $this->db->update('device', $data);
    }
    public function taskAnalytics()
    {
        $this->db->select('count(a.`Status`) as Completed');
        $this->db->select('b.Full_Name');

        $this->db->from('tasks AS a');

        $this->db->join('users AS b', 'b.ID = a.User_ID', 'left');

        $this->db->where('a.`Status`', 'Completed');

        $this->db->group_by('b.Full_Name');

        $query = $this->db->get();
        return $query->result_array();
    }
}

