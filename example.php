<!DOCTYPE html>
<html>
<title>Мой магазин</title>
<head>
    <title>class work#3</title>
</head>

<style>
    ul {
        list-style: none;
        padding: 0;

    }
    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }
    * html .clearfix { height: 1%; }
    .clearfix { display: block; }
    .header {
        width: 100%;
        padding: 5px;
        background: #ddd;
        margin-bottom: 10px;
    }
    .sidebar{
        float: left;
        width: 250px;
        padding: 5px;
    }
    .container {
        width: 1000px;
        float: left;
        padding: 5px;
    }
    .red {
        color: red;
    }
    .menu_link {
        float: left;
        padding-left: 5px;
    }
    .menu_link:hover{
        cursor: pointer;
    }
    .h2_title{
        font-size: 16px;
        text-align: left;
    }
    .inner{
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 2px;
    }
    .product_item{
        width: 30%;
        float: left;
        padding: 2px;
        min-height: 250px;
        border: 1px solid #ddd;
        border-radius: 3px;
        margin: 5px;
        position: relative;
    }
    .image{
        background: #CCCCCC;
        height: 150px;
        margin: 0 5px 0 5px;
    }
    .product_name{
        text-align: center;
        cursor: pointer;
    }
    .date{
        text-align: right;
        background: #d4a507;
        padding: 2px;
        position: absolute;
        right: 0;
        top:0
    }
    .price {
        text-align: center;
        font-weight: bold;
    }
    .stock{
        text-align: right;
    }


</style>


<body>

<div class="header">
    <? if($pages):?>
    <ul class="clearfix">
        <? foreach ($pages as $menu) {
            if($menu->visible) {
                echo "<li class='menu_link'><a href=".$menu->url.">$menu->name</a></li>";
            } else { // этого быть не должно
                echo "<li class='menu_link'><a class='red' href=".$menu->url.">$menu->name</a></li>";
            }
        }
        ?>
    </ul>
    <? endif ?>

</div>

<div class="sidebar">
    <div class="inner">
        <h2 class="h2_title">Каталог товаров</h2>
    </div>
</div>
<div class="container">
    <div class="inner">
        <? if($products) :?>
            <ul class="clearfix">
                <? foreach ($products as $product) :?>
                    <? if($product->visible):?>
                    <li class="product_item">
                        <span class="date"><? echo date('m.d.y',strtotime($product->created)) ?></span>
                        <div class="image"></div>
                        <div class="product_name">
                            <a href="<? echo $product->url ?>"><? echo $product->name ?></a>
                        </div>
                        <div>
                          Здесь будет вывод цены товара
                        </div>
                        <div class="stock">
                            Товара на складе <? echo $variant->stock ?> шт
                        </div>
                    </li>
                    <? endif; ?>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
    </div>
</div>


</body>
</html>