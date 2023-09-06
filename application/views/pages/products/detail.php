<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    <title><?= $page['title'] . " • " . APP_NAME ?></title>
</head>

<body>
    <header>
        <?php $this->load->view('components/_nav_ecom') ?>
    </header>
    <main id="productDetails">
        <div class="container">
            <div class="row m-0">
                <div class="col-xl-9 col-lg-8 col-12">
                    <div class="product__wrapper">
                        <div class="row m-0">
                            <div class="col-lg-6 col-12">
                                <div class="media-content py-3">
                                    <div class="dropdown share_button">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-share"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="mailto:?body=I want to recommend this product at Amazon%0A%0AXiaomi Redmi 10 Power (Power Black%2C 8GB RAM%2C 128GB Storage)%0Aby Darshita Etel%0ALearn more<?= current_url() ?>/?ref=direct_share_mail&subject=Check this out at Amazon"><i class="fa-regular fa-envelope"></i></a></li>
                                            <li><a class="dropdown-item" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=<?= current_url() ?>/?ref=direct_share_pinterest&description=<?= $product['name'] ?>&media=<?= base_url('uploads/products/' . $product['image']) ?>&method=button"><i class="fa-brands fa-pinterest"></i></a></li>
                                            <li><a class="dropdown-item" target="_blank" href="https://www.facebook.com/sharer.php?u=<?= current_url() ?>&redirect_uri=<?= current_url() ?>/?ref=direct_share_facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item" id="clipText" data-clipboard-text="<?= current_url() ?>?ref=direct_share_clipboard"><i class="fa-solid fa-link"></i></a>
                                            </li>
                                            <script>
                                                var clipboard = new ClipboardJS('#clipText');
                                            </script>
                                        </ul>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">
                                            <div class="swiper main_gallery mb-3">
                                                <div class="swiper-wrapper">
                                                    <?php for ($i = 0; $i < 10; $i++) : ?>
                                                        <div class="swiper-slide">
                                                            <img src="<?= $product['image'] ?>" />
                                                        </div>
                                                    <?php endfor ?>
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div thumbsSlider="" class="swiper  gallery_thumbs">
                                                <div class="swiper-wrapper">
                                                    <?php for ($i = 0; $i < 10; $i++) : ?>
                                                        <div class="swiper-slide">
                                                            <img src="<?= $product['image'] ?>" />
                                                        </div>
                                                    <?php endfor ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="text-content">
                                    <div class="product__title">
                                        <h1><?= $product['name'] ?></h1>
                                    </div>
                                    <div class="">
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero placeat repudiandae eligendi, quam ab esse ipsa veritatis velit tempora tenetur!
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo distinctio voluptatibus enim. Porro nam excepturi magnam quod rem, expedita laborum molestias natus ducimus debitis aspernatur iste. Nulla accusamus, suscipit mollitia tenetur enim velit aliquid et rerum, alias quam officiis debitis.
                                        </p>
                                    </div>
                                    <div class="offers__section mb-3">
                                        <div class="d-flex align-items-center icon-sprite-title mb-2">
                                            <span class="offer_icon product_offer_sprite"></span>&nbsp;<strong>Offers</strong>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-md-6 col-12 p-0">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <ul class="nav gap-2">
                                                            <?php for ($i = 0; $i < 6; $i++) : ?>
                                                                <li class="nav-item">
                                                                    <div class="icon_sprite delivery_options free_delivery_sprite_icon"></div>
                                                                </li>
                                                            <?php endfor ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row m-0 g-0">
                                            <div class="col-4">
                                                <strong>Brand</strong>
                                            </div>
                                            <div class="col-8">
                                                Brand Name
                                            </div>
                                            <?php for ($i = 0; $i < 5; $i++) : ?>
                                                <div class="col-4">
                                                    <strong>Property <?= $i ?></strong>
                                                </div>
                                                <div class="col-8">
                                                    Value of Property <?= $i ?>
                                                </div>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et repudiandae nesciunt voluptas eaque delectus repellendus sed enim architecto a sunt. Facilis reprehenderit omnis aliquid magnam molestiae ducimus nulla incidunt id repellat sapiente nam itaque ad aperiam consequatur, commodi, quae et nihil dolor ratione expedita nobis. Sapiente saepe a consectetur voluptates ullam aliquid, magni praesentium, dignissimos nihil laborum tempore, ad voluptatum voluptate? Officiis dicta quam nobis iusto doloremque. Quidem, est earum doloribus alias asperiores ipsa autem maxime deserunt tenetur accusamus? Suscipit natus totam cumque corporis eos sint nobis facilis. Quas eius porro placeat laboriosam ab! Blanditiis placeat quod fugit eaque quo?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-12">
                    <?php if (null !== $this->session->flashdata("cart_success")) : ?>
                        <div class="alert alert-success alert-dismissible mb-3" role="alert">
                            <div class="d-flex gap-2">
                                <img src="<?= (null !== $this->session->flashdata("cart_product_id")) ? $product['image'] : "" ?>" alt="" width="30">
                                <div class="">Added to <a href="<?= base_url('cart') ?>" class="alert-link">Cart</a></div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <div class="alert-wrapper" id="alertWrapper">

                    </div>
                    <div class="price_offers__wrapper card">
                        <div class="card-body">
                            <form id="checkoutForm" action="" method="post">
                                <div class="mb-3 d-flex gap-2 align-items-center">
                                    <label for="">Quantity</label>
                                    <select name="quantity" id="qty" class="form-control w-auto">
                                        <?php for ($i = 1; $i < 10; $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-block btn-secondary" id="addToCart">Add to Cart</button>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="Buy Now" class="btn btn-block btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <pre>
                <?php print_r($product) ?>
            </pre>
        </div>
    </main>
    <?= $this->session->product_history ?>
    <footer>
        <?php $this->load->view('components/_common_footer') ?>
    </footer>
    <?php $this->load->view('components/_common_js') ?>
    <script src="<?= base_url('assets/js/snippets.js') ?>"></script>
    <script>
        $(document).ready(function() {
            // BUY NOW
            var targetUrl = "<?php echo base_url(); ?>CartHandler/add";
            
            $("#checkoutForm").submit((event) => {
                const formData = JSON.stringify({
                    'id': "<?= $product['id'] ?>",
                    'qty': $("#qty").val()
                });
                /* Add to Cart First */
                $.ajax({
                    type: "POST",
                    url: targetUrl,
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function() {
                        addAlert('Added to Cart', 'success');
                        console.log("Product Added");
                    },
                    error: function(data) {
                        addAlert('Failed to Add', 'danger');
                        console.log("Product Add Failed", data);
                    }
                });
                event.preventDefault();
                /* Go to Checkout URL*/

            });

            // ADD TO CART
            $('#addToCart').click(() => {
                const formData = JSON.stringify({
                    'id': "<?= $product['id'] ?>",
                    'qty': $("#qty").val()
                });
                console.log(formData);
                addToCart(targetUrl, formData)
                event.preventDefault();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".main_gallery", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 1,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper_thumbs = new Swiper(".gallery_thumbs", {
            loop: true,
            slidesPerView: 4,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>


    <!-- <script>
        function copyText() {
            navigator.clipboard.writeText("<?= current_url() ?>");
            alert("Text Copied to Clipboard");
        }
    </script> -->

</body>

</html>