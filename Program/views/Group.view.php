<?php
class GroupView {
    public function render ($data) {
        $num = 1;
        
        $header = "
          <th class='text-center align-center'>NO</th>
          <th class='text-center align-center'>NAME</th>
          <th class='text-center align-center'>DESCRIPTION</th>
        ";
      
        $dataGroup = null;
        foreach ($data['group'] as $val) {
            list($id, $name, $description) = $val;
            $dataGroup .= "
              <tr class='text-center align-middle'>
                <td>" . $num++ . "</td>
                <td>" . $name . "</td>
                <td>" . $description . "</td>
                <td>
                  <a href='?form=$id' class='btn btn-warning'>Edit</a>
                  <a href='?delete_id=$id' class='btn btn-danger'>Delete</a>
                </td>
              </tr>
            ";
        }

        $template = new Template("templates/tables.html");

        $template->replace("XTITLE", "Group List");
        $template->replace("XGROUP", "active");
        $template->replace("XBUTTON", "Group");
        $template->replace("XHEADER", $header);
        $template->replace("XTABLE", $dataGroup);
        $template->write();
    }

    public function fill ($data = null) {
        if ($data) list($id, $name, $description) = $data;
          
        $form = ($data ? ("<input type='hidden' name='id' value='" . $id . "'>") : "") . "
            <div class='form-group mb-3'>
              <label for='name' class='form-label'>Name</label>
              <input type='text' id='name' name='name' class='form-control' placeholder='Enter group name' " . ($data ? ("value='" . $name . "'") : "") . " required>
            </div>

            <div class='form-group mb-3'>
              <label for='description' class='form-label'>Description</label>
              <input type='text' id='description' name='description' class='form-control' placeholder='Enter group description' " . ($data ? ("value='" . $description . "'") : "") . " required>
            </div>
        ";

        $template = new Template("templates/form.html");
        $template->replace("XTITLE", $data ? "Edit Group" : "Create Group");
        $template->replace("XFORM", $form);
        $template->replace("XPAGE", "group");
        $template->replace("XSEND", $data ? "update" : "create");
        $template->write();
    }
}