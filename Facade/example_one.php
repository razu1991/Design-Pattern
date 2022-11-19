<?php
####################################
##### FACADE DESIGN PATTERN #######
####################################
class Cart
{
    /**
     * Product added in cart
     * @param $products
     * @return void
     */
    public function addProducts($products)
    {
        echo "Product added in cart<br/>";
    }

    /**
     * Checkout products
     * @return void
     */
    public function getProducts()
    {
        echo "Checkout product<br/>";
    }
}

class Order
{
    /**
     * Process order
     * @param $products
     * @return void
     */
    public function process($products)
    {
        echo "Order processing<br/>";
    }
}

class Payment
{
    /**
     * Add additional charges
     * @param $charge
     * @return void
     */
    public function charge($charge)
    {
        echo "Include additional charge and calculate total charge<br/>";
    }

    /**
     * Make payment and return success or failed
     * @return string
     */
    public function makePayment()
    {
        echo "Redirect to payment site and make payment<br/>";
        return 1; // 1 means success and 0 means failed
    }
}

class Shipping
{
    /**
     * Calculate and added shipping charge
     * @return void
     */
    public function calculateCharge()
    {
        echo "Added shipping charge<br/>";
    }

    /**
     * Ship products
     * @return void
     */
    public function shipProducts()
    {
        echo "Ship this products<br/>";
    }
}

class CustomerFacade
{
    /**
     * Assign all classes instance
     */
    public function __construct()
    {
        $this->cart = new Cart;
        $this->order = new Order;
        $this->payment = new Payment;
        $this->shipping = new Shipping;
    }

    /**
     * Added to cart
     * @return Cart
     */
    public function addToCart($products)
    {
        $this->cart->addProducts($products);
    }

    /**
     * Checkout process
     * @return void
     */
    public function checkout()
    {
        $products = $this->cart->getProducts();
    }

    /**
     * Calculate charge, make payment and ship products
     * @return void
     */
    public function makePayment()
    {
        $charge = $this->shipping->calculateCharge();
        $this->payment->charge($charge);

        $isCompleted = $this->payment->makePayment();

        if ($isCompleted) {
            $this->shipping->shipProducts();;
        }
    }
}

// Instantiate objects of facade class
$customer = new CustomerFacade;

// Product List
$products = [
    [
        'name' => 'Polo T-Shirt',
        'price' => 40,
    ],
    [
        'name' => 'Smart Watch',
        'price' => 400,
    ]
];

// Add to cart
$customer->addToCart($products);
// Checkout
$customer->checkout();
// Make payment
$customer->makePayment();