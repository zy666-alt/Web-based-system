<?php
require "../_base.php";
include '../_head.php';
$_title = 'Drink Shop';
?>

<h2>Our Drinks Menu</h2>

<ol>
    <li>Matcha Strawberry Boba Milk Tea</li>
    <li>Mango Boba Milk Tea</li>
    <li>Chocolate Peanut Boba Milk Tea</li>
    <li>Chocolate Boba Milk Tea</li>
    <li>Watermelon Fresh Juice</li>
    <li>Ice Latte</li>
    <li>Citrus Sunrise Juice</li>
    <li>Iced Lemon Orange Tea</li>
    <li>Matcha Iced Latte</li>
    <li>Hot Latte</li>
    <li>Hot Matcha Latte</li>
    <li>Sweet Strawberry</li>
    <li>Ice Caramel Latte</li>
    <li>Ice Chocolate</li>
    <li>Hot Chocolate</li>
</ol>

<style>
    #img {
        width: 600px;
        height: 400px;
        border: 10px solid orange;
        box-shadow: 0 0 10px #000;
        border-radius: 10px;
        cursor: pointer;
    }
</style>

<p id='p'>Drink 1 of 15</p>

<img id="img" src="/images/drink1.jpg" alt="Drink Image">

<script>
    const arr = [
        '/images/image1.png',
        '/images/image2.png',
        '/images/image3.png',
        '/images/image4.png',
        '/images/image5.png',
        '/images/image6.png',
        '/images/image7.png',
        '/images/image8.png',
        '/images/image9.png',
        '/images/image10.png',
        '/images/image11.png',
        '/images/image12.png',
        '/images/image13.png',
        '/images/image14.png',
        '/images/image15.png'
    ];

    let i = 0;

    $('#img').on('click', e => {

        i = (i + 1) % arr.length;

        $('#p').text(`Drink ${i + 1} of ${arr.length}`);

        $('#img')
        .hide()
        .prop('src', arr[i])
        .fadeIn();
    });
</script>

<?php
include "../_foot.php";
?>
