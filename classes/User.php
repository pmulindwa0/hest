<?php

class User
{
    private $_db,
        $_data,
        $_sessionName, $_isLoggedIn;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {

                }
            }
        } else {
            $this->find($user);

        }
    }

    public function update($fields = array(), $id = null)
    {

        if (!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }
        if (!$this->_db->update('users', $id, $fields)) {
            throw new Exception("There was a problem updating user profile");

        }
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('users', $fields)) {
            throw new Exception("There was a problem creating a user");

        }
    }

    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));
            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }

        }
        return false;
    }

    public function login($username = null, $password = null, $remember)
    {
        $user = $this->find($username);
        if ($user) {
            if ($this->data()->password === $password) {
                Session::put($this->_sessionName, $this->data()->id);
                /*if ($remember) {
                    # code...
                }*/
                return true;
            }
        }

        return false;

    }

    public function hasPermission($key)
    {
        $group = $this->_db->get('group', array('id', '=', $this->data()->group));
        if ($group->count()) {
            $permissions = json_decode($group->first()->permissions, true);
            if ($permissions[$key] == true) {
                return true;
            }
        }
        return false;
    }

    public function exists()
    {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout()
    {
        Session::delete($this->_sessionName);

    }

    public function data()
    {
        return $this->_data;
    }

    public function isloggedIn()
    {
        return $this->_isLoggedIn;
    }
}