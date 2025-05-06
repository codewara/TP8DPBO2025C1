<?php
class StudentView {
    public function render ($data) {
        $num = 1;
        
        $header = "
          <th class='text-center align-center'>NO</th>
          <th class='text-center align-center'>NAME</th>
          <th class='text-center align-center'>NIM</th>
          <th class='text-center align-center'>PHONE</th>
          <th class='text-center align-center'>JOIN DATE</th>
        ";
      
        $dataStudent = null;
        foreach ($data['student'] as $val) {
            list($id, $name, $nim, $phone, $join_date) = $val;
            $dataStudent .= "
              <tr class='text-center align-middle'>
                <td>" . $num++ . "</td>
                <td>" . $name . "</td>
                <td>" . $nim . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>
                  <a href='?form=$id' class='btn btn-warning'>Edit</a>
                  <a href='?delete_id=$id' class='btn btn-danger'>Delete</a>
                </td>
              </tr>
            ";
        }

        $template = new Template("templates/tables.html");

        $template->replace("XTITLE", "Student List");
        $template->replace("XSTUDENT", "active");
        $template->replace("XBUTTON", "Student");
        $template->replace("XHEADER", $header);
        $template->replace("XTABLE", $dataStudent);
        $template->write();
    }

    public function fill ($data = null) {
        if ($data) list($id, $name, $nim, $phone, $join_date) = $data;
            
        $form = ($data ? ("<input type='hidden' name='id' value='" . $id . "'>") : "") . "
            <div class='form-group mb-3'>
              <label for='name' class='form-label'>Name</label>
              <input type='text' id='name' name='name' class='form-control' placeholder='Enter your name' " . ($data ? ("value='" . $name . "'") : "") . " required>
            </div>

            <div class='form-group mb-3'>
              <label for='nim' class='form-label'>NIM</label>
              <input type='text' id='nim' name='nim' class='form-control' placeholder='Enter your NIM' " . ($data ? ("value='" . $nim . "'") : "") . " required>
            </div>

            <div class='form-group mb-3'>
              <label for='phone' class='form-label'>Phone</label>
              <input type='text' id='phone' name='phone' class='form-control' placeholder='Enter your phone number' " . ($data ? ("value='" . $phone . "'") : "") . " required>
            </div>
        ";

        $template = new Template("templates/form.html");
        $template->replace("XTITLE", $data ? "Edit Student" : "Create Student");
        $template->replace("XFORM", $form);
        $template->replace("XPAGE", "index");
        $template->replace("XSEND", $data ? "update" : "create");
        $template->write();
    }
}