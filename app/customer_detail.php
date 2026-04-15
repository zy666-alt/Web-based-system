<?php
include '../_base.php';

// ----------------------------------------------------------------------------
// CHECK LOGIN (optional - admin or staff only)
// ----------------------------------------------------------------------------

if (!$_user) {
    temp('info', 'Please login first');
    redirect('/login.php');
}

// ----------------------------------------------------------------------------
// GET CUSTOMER ID
// ----------------------------------------------------------------------------

$id = req('id');

$stm = $_db->prepare('SELECT * FROM user WHERE id = ?');
$stm->execute([$id]);
$c = $stm->fetch();

if (!$c) {
    temp('info', 'Customer not found');
    redirect('customer_list.php');
}

// ----------------------------------------------------------------------------

$_title = 'Customer | Detail';
include '../_head.php';
?>

<h2>Customer Detail</h2>

<table class="table detail">
    <tr>
        <th>Name</th>
        <td><?= $c->name ?></td>
    </tr>

    <tr>
        <th>Email</th>
        <td><?= $c->email ?></td>
    </tr>

    <tr>
        <th>Phone_number</th>
        <td><?= $c->phone_number ?></td>
    </tr>
  
      <tr>
        <th>Gender</th>
        <td><?= $c->gender ?></td>
    </tr>
  
       <tr>
        <th>Address_line1</th>
        <td><?= $c->address_line1?></td>
    </tr>
  
         <tr>
        <th>Address_line2</th>
        <td><?= $c->address_line2?></td>
    </tr>
  
         <tr>
        <th>Address_line2</th>
        <td><?= $c->address_line2?></td>
    </tr>
     
         <tr>
        <th>City</th>
        <td><?= $c->city?></td>
    </tr>

           <tr>
        <th>state </th>
        <td><?= $c->state?></td>
    </tr>

           <tr>
        <th>Post_code </th>
        <td><?= $c->post_code?></td>
    </tr>
             <tr>
        <th>Register_Date </th>
        <td><?= $c->register_Date?></td>
    </tr>

               <tr>
        <th>Password </th>
        <td><?= $c->password?></td>
    </tr>
</table>

<p>
    <button data-get="customer_list.php">Back</button>
</p>

<?php include '../_foot.php'; ?>
