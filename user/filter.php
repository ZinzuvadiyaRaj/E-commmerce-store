<?php

include 'master_header.php';

$catagory = "SELECT * FROM category";
$category_res = mysqli_query($con,$catagory);
?>
<form action="" method="GET">
<?php
if(mysqli_num_rows($category_res) > 0)
{
    foreach($category_res as $category_list)
    {
        $checked = [];
        if(isset($_GET['category']))
        {
            $checked = $_GET['category'];
        }
        ?>
        <div>
            <input type="checkbox" name="category[]" value="<?php echo $category_list['id']; ?>"
                <?php if(in_array($category_list['id'], $checked)) {echo "checked";}?>
            />
            <?= $category_list['category'] ?>
        </div>
    <?php 
    }
}
else
{
    echo "Category Not Found";
}
?>



<hr>

<?php

if(isset($_GET['category']))
{
    $category_checked = [];
    $category_checked = $_GET['category'];
    foreach($category_checked as $subcatagory_items)
    {
        $subcatagory = "SELECT * FROM sub_category WHERE category IN ($subcatagory_items)";
        $subcategory_res = mysqli_query($con,$subcatagory);
        
        if(mysqli_num_rows($subcategory_res) > 0)
        {
            foreach($subcategory_res as $subcategory_list)
            {
                $subchecked = [];
                if(isset($_GET['subcategory']))
                {
                    $subchecked = $_GET['subcategory'];
                }
                ?>
                <div>
                    <input type="checkbox" name="subcategory[]" value="<?php echo $subcategory_list['id']; ?>"
                        <?php if(in_array($subcategory_list['id'], $subchecked)) {echo "checked";}?>
                    />
                    <?= $subcategory_list['sub_category'] ?>
                </div>
                <?php
            }
        }
        else
        {   
            echo "Not found";
        }
    }
}
else
{
    echo "";
}

?>
<button class="btn btn-primary">submit</button>
</form>


<?php

if(isset($_GET['subcategory']))
{
    $subcategory_checked = [];
    $subcategory_checked = $_GET['subcategory'];
    foreach($subcategory_checked as $product_items)
    {
        $products = "SELECT * FROM products WHERE subcategory IN ($product_items)";
        $products_res = mysqli_query($con,$products);
        
        if(mysqli_num_rows($products_res) > 0)
        {
            foreach($products_res as $product_list)
            {?>
                <div>
                    <?php // echo $product_list['image']; ?>
                    <img src="../admin/images/<?php echo $product_list['image']; ?>" alt="image not found" height="100px" width="100px">
                </div>
                <?php
            }
        }
        else
        {   
            echo "Not found";
        }
    }
}
else
{
    echo "";
}

?>