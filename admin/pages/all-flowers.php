<style>
    /* Modal styles */
    #confirmation-modal {
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.7);
        /* Black w/ opacity */
        z-index: 999;
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
        /* Could be more or less, depending on screen size */
    }

    /* Modal button styles */
    .conf-btn {
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        border: none;
        color: #fff;
    }

    .checkbtn {
        border-radius: 50%;
        width: 14%;
        margin: auto;
        background-color: red;
    }

    .checkbtn i {
        font-size: 30px;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>

<?php
if( isset ($_SESSION['username']) && isset( $_SESSION['password'] ) ) {
include_once ("config.php");

$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $limit;



$sql = "SELECT * FROM flower LIMIT {$offset}, {$limit}";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>
    <div class="py-4 px-4">
        <div class="col-3 pb-4">
            <select class="form-select" id="recordsPerPage" aria-label="Default select example">
                <option selected>Select Per Page</option>
                <option value="1">1</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <table class="table table-striped bg-light">
            <tr>
                <th>S.N</th>
                <th> Name</th>
                <th>Content</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class="text-capitalize"><?php echo $row['name']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><img src="pages/uploads/<?php echo $row['images']; ?>" alt="image" width="200px" height="160px"></td>
                    <td class="d-flex py-5">
                        <button class="btn btn-primary me-2">
                            <a href="?pages=edit-flowers&&id=<?php echo $row['flower_id']; ?>"
                                class="text-light text-decoration-none">
                                Edit
                            </a>
                        </button>
                        <button class=" btn btn-danger delete-btn">
                            <a href="?pages=delete-flowers&&id=<?php echo $row['flower_id']; ?>"
                                class="text-light text-decoration-none">
                                Delete
                            </a>
                        </button>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    </div>
    <?php
}

?>

<!-- pagination section -->
<div class="pagination ms-4 py-5 text-center">
    <nav aria-label="Page navigation example mx-auto">
        <?php

        $sql1 = "SELECT * FROM flower";

        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            $total_records = mysqli_num_rows($result1);

            $total_pages = ceil($total_records / $limit);
            ?>
            <ul class="pagination justify-content-center">

                <?php
                if ($page > 1) {
                    ?>
                    <li class="page-item"><a class="page-link"
                            href="http://localhost/flowers/admin/?pages=all-flowers&&page= <?php echo $page - 1; ?>">Prev</a>
                    </li>
                    <?php
                }
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    ?>
                    <li class="page-item <?php echo $active; ?>"><a class="page-link"
                            href="http://localhost/flowers/admin/?pages=all-flowers&&page= <?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php
                }
                if ($total_pages > $page) {
                    ?>
                    <li class="page-item"><a class="page-link"
                            href="http://localhost/flowers/admin/?pages=all-flowers&&page= <?php echo $page + 1; ?>">Next</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <?php
        }
        ?>
    </nav>
</div>
<!-- pagination section close -->

<!-- Confirmation Popup -->
<div id="confirmation-modal" class="modals d-none">
    <div class="modal-content">
        <button class="conf-btn checkbtn"><i class="fa-solid fa-xmark"></i></button>
        <h5 id="message" class="py-3 message text-center text-danger">Are you sure you want to delete?</h5>
        <div class="d-grid gap-2 my-3">
            <button class="conf-btn btn-danger" id="popupYes">Yes</button>
            <button class="conf-btn btn-primary" id="popupNo">No</button>
        </div>
    </div>
</div>


<script>
    
    document.addEventListener('DOMContentLoaded', function () {


        //HANDLE CONFIRMATION POPUP FOR DELETE BUTTON

        //fetching modal section
        const modals = document.getElementById('confirmation-modal');


        //fetching yes and no button 
        const yesBtn = document.getElementById('popupYes');
        const noBtn = document.getElementById('popupNo');

        //fetching delete button
        const deleteBtns = document.querySelectorAll('.delete-btn');

        //Add click event listener to each delete button
        deleteBtns.forEach(function (deleteBtn) {
            deleteBtn.addEventListener("click", function (event) {
                // console.log('hello');



                //prevent default behaviour of the link
                event.preventDefault();

                //show the modal
                modals.classList.add('d-block');
                modals.classList.remove('d-none');


                const deleteUrl = deleteBtn.querySelector('a').href;

                //if user click yes button, redirect to the delete url
                yesBtn.addEventListener("click", function () {
                    window.location.href = deleteUrl;
                })

                //if user click no button, hide the modal
                noBtn.addEventListener("click", function () {
                    modals.classList.add('d-none');
                    modals.classList.remove('d-block');
                })

            });
        });

        //close the modal if user click anywhere outside of it
        window.addEventListener("click", function (event) {
            if (event.target === modals) {
                modals.classList.add('d-none');
                modals.classList.remove('d-block');
            }
        })

        //HANDLE PER PAGE SECTION
        const selectPerPage = document.getElementById('recordsPerPage');

        selectPerPage.addEventListener("change", function() {
            const selectedValue = this.value;
            const currentPageUrl = window.location.href;
            const url = new URL(currentPageUrl);
            url.searchParams.set('limit', selectedValue );
            window.location.href = url;
        })
    });

</script>
<?php 

} else {
    header( "Location: http://localhost/flowers/admin/login.php");
}
?>
