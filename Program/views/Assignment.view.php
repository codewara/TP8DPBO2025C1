<?php
class AssignmentView {
    public function render ($data) {
        $num = 1;
        
        $header = "
        <th class='text-center align-center'>NO</th>
        <th class='text-center align-center'>TITLE</th>
        <th class='text-center align-center'>DESCRIPTION</th>
        <th class='text-center align-center'>DEADLINE</th>
        <th class='text-center align-center'>STUDENT NAME</th>
        ";
        
        $dataAssignment = null;
        foreach ($data['assignment'] as $val) {
            list($id, $title, $description, $deadline, $s_id, $name) = $val;
            $dataAssignment .= "
              <tr class='text-center align-middle'>
                <td>" . $num++ . "</td>
                <td>" . $title . "</td>
                  <td>" . $description . "</td>
                  <td>" . $deadline . "</td>
                  <td>" . $name . "</td>
                  <td>
                    <a href='?form=$id' class='btn btn-warning'>Edit</a>
                    <a href='?delete_id=$id' class='btn btn-danger'>Delete</a>
                  </td>
              </tr>
            ";
        }

        $template = new Template("templates/tables.html");

        $template->replace("XTITLE", "Assignment List");
        $template->replace("XASSIGNMENT", "active");
        $template->replace("XBUTTON", "Assignment");
        $template->replace("XHEADER", $header);
        $template->replace("XTABLE", $dataAssignment);
        $template->write();
    }

    public function fill ($data = null) {
      if ($data['main']) list($id, $title, $description, $deadline, $s_id, $name) = $data['main'];
      $students = $data['student'];
          
        $form = ($data['main'] ? ("<input type='hidden' name='id' value='" . $id . "'>") : "") . "
            <div class='form-group mb-3'>
              <label for='title' class='form-label'>Title</label>
              <input type='text' id='title' name='title' class='form-control' placeholder='Enter assignment title' " . ($data['main'] ? ("value='" . $title . "'") : "") . " required>
            </div>

            <div class='form-group mb-3'>
              <label for='description' class='form-label'>Description</label>
              <input type='text' id='description' name='description' class='form-control' placeholder='Enter assignment description' " . ($data['main'] ? ("value='" . $description . "'") : "") . " required>
            </div>

            <div class='form-group mb-3'>
              <label for='deadline' class='form-label'>Deadline</label>
              <input type='date' id='deadline' name='deadline' class='form-control' " . ($data['main'] ? ("value='" . $deadline . "'") : "") . " required>
            </div>

            <div class='form-group mb-3'>
              <label for='student_id' class='form-label'>Student</label>
              <select id='student_id' name='student_id' class='form-control' required>
                <option value=''>-- Select Student --</option>";
                foreach ($students as $item) {
                    list($s_ID, $name) = $item;
                    $form .= "<option value='$s_ID' " . ($data['main'] && $s_ID == $s_id ? "selected" : "") . ">$name</option>";
                } $form .= "
              </select>
            </div>
        ";

        $template = new Template("templates/form.html");
        $template->replace("XTITLE", $data['main'] ? "Edit Assignment" : "Create Assignment");
        $template->replace("XFORM", $form);
        $template->replace("XPAGE", "assignment");
        $template->replace("XSEND", $data['main'] ? "update" : "create");
        $template->write();
    }
}