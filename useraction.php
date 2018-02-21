    <!--  delete blog  -->
                            <?php

                            	require 'database.php';
                            	$user_email_id=$_REQUEST["user_email_id"];
                                $obj=new database();
                                $res=$obj->userdelete($user_email_id);
                                 echo '<script langauge="javascript">;
                                    alert("Student deleted sucessfully");
                                    window.location.href="user_approve.php";
                                    </script>';

                            ?>
