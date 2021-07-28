<?php require_once 'header-admin.php'; ?>

<div class="d-flex flex-row">
  <?php require_once 'sidebar-admin.php'; ?>

  <div class="tab-content">
    <h2>Users List</h2>

    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>

      <?php 
        foreach ($users as $key => $user) {
          echo '<tr>';
          echo '<td>' . $user['name'] . '</td>';
          echo '<td>' . $user['email'] . '</td>';
          echo '<td>' . $user['phone'] . '</td>';
          echo '<td> <a href="" class="me-2"> Edit </a> <a href=""> Delete </a></td>';
          echo '</tr>';
        }
      ?>
    </table>
  </div>
    
</div>

<?php require_once 'footer-admin.php'; ?>