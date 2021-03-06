<?php include('partials/menuu.php');?>

        <!-- Main content section start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Order</h1>

            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?><br><br>

<table cellspacing="5px" >
    <thead>
    <tr>
        <th>S.N</th>
        <th>Food</th>
        <!-- <th>Price</th> -->
        <th>Qty</th>
        <th>Total <br> Amount</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Customer Name</th>
        <th>Contact</th>
        <!-- <th>Email</th> -->
        <th>Address</th>
        <th>Supplier <br> Username</th>
        <th>Supplier <br> Location</th>
        <th>Actions</th>
    </tr>
    </thead>
    <?php
        //Get all the orders from database
        $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
        //Execute Query
        $res = mysqli_query($conn, $sql);
        //Count the rows
        $count = mysqli_num_rows($res);

        $sn = 1; // Serial number

        if($count>0)
        {
            //Order Available
            while($row=mysqli_fetch_assoc($res))
            {
                //Get all the order details
                $id = $row['id'];
                $food = $row['food'];
                // $price = $row['price'];
                $qty = $row['qty'];
                $total = $row['total'];
                $order_date = $row['order_date'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                // $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
                $username = $row['supplier_username'];
                $supplier_location = $row['supplier_location']

                ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $food; ?></td>
                    <!-- <td><?php echo $price; ?></td> -->
                    <td><?php echo $qty; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $order_date ?></td>

                    <td>
                        <?php
                            if($status=="Ordered")
                            {
                                echo "<label>$status</label>";
                            }
                            elseif($status=="On Delivery")
                            {
                                echo "<label style='color: orange; '>$status</label>";
                            }
                            elseif($status=="Delivered")
                            {
                                echo "<label style='color: green; '>$status</label>";
                            }
                            elseif($status=="Cancelled")
                            {
                                echo "<label style='color: red; '>$status</label>";
                            }
                        ?>
                    </td>

                    <td><?php echo $customer_name; ?></td>
                    <td><?php echo $customer_contact; ?></td>
                    <!-- <td><?php echo $customer_email; ?></td> -->
                    <td><?php echo $customer_address; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $supplier_location; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="buttondesign green">Update</a>
                    </td>
                </tr>

                <?php
            }
        }
        else
        {
            //Order not available
            echo "<div colspan='12' class='error'>Order not Available</div>";
        }
    ?>
</table>
            </div>
        </div>
        <!-- Main content section ends -->