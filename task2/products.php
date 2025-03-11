<?php
header('Content-Type: application/json');
define('task2', 'products.json');
function getProducts() {
    $products = json_decode(file_get_contents(task2), true);
    echo json_encode($products);
}


function addProduct() {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;

    if (!$name || !$price) {
        echo json_encode(["message" => "Product name and price are required"]);
        return;
    }


    $products = json_decode(file_get_contents(task2), true);

    $newProduct = [
        'id' => count($products) + 1,
        'name' => $name,
        'price' => (float)$price
    ];

    $products[] = $newProduct;

    file_put_contents(task2, json_encode($products, JSON_PRETTY_PRINT));

    echo json_encode(["message" => "Product added", "product" => $newProduct]);
}

function updateProduct($id) {
   
    parse_str(file_get_contents("php://input"), $putData);

    $name = $putData['name'] ?? '';
    $price = $putData['price'] ?? 0;

    if (!$name || !$price) {
        echo json_encode(["message" => "Product name and price are required"]);
        return;
    }

    $products = json_decode(file_get_contents(task2), true);

  
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $name;
            $product['price'] = (float)$price;

           
            file_put_contents(task2, json_encode($products, JSON_PRETTY_PRINT));

            echo json_encode(["message" => "Product updated", "product" => $product]);
            return;
        }
    }

    echo json_encode(["message" => "Product not found"]);
}


function deleteProduct($id) {
  
    $products = json_decode(file_get_contents(task2), true);


    foreach ($products as $key => $product) {
        if ($product['id'] == $id) {
            unset($products[$key]);

        
            $products = array_values($products);

         
            file_put_contents(task2, json_encode($products, JSON_PRETTY_PRINT));

            echo json_encode(["message" => "Product deleted"]);
            return;
        }
    }

    echo json_encode(["message" => "Product not found"]);
}

// Handle different HTTP methods
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        getProducts();
        break;

    case 'POST':
        addProduct();
        break;

    case 'PUT':
        $id = $_GET['id'] ?? null;
        if ($id) {
            updateProduct($id);
        } else {
            echo json_encode(["message" => "Product ID required"]);
        }
        break;

    case 'DELETE':
        $id = $_GET['id'] ?? null;
        if ($id) {
            deleteProduct($id);
        } else {
            echo json_encode(["message" => "Product ID required"]);
        }
        break;

    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}
?>
