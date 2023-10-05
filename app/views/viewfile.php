<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample CRUD - Modern Store UI</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #e0f7fa; /* Light green background */
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff; /* White container background */
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .header {
        background-color: #00acc1; /* Teal header background */
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    .header a {
        color: white;
        text-decoration: none;
    }

    .header a:hover {
        text-decoration: underline;
    }

    .content {
        display: flex;
        justify-content: space-between;
    }

    .form-section {
        flex: 1;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        margin-right: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .form-group input {
        width: calc(100% - 10px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .submit-button {
        text-align: center;
        margin-top: 15px;
    }

    .submit-button input {
        padding: 15px 30px;
        background-color: #00acc1; /* Teal button color */
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
    }

    .submit-button input:hover {
        background-color: #007c91; /* Darker teal on hover */
    }

    .table-section {
        flex: 1;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    table th, table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #00acc1; /* Teal table header */
        color: white;
    }

    table tr:hover {
        background-color: #f5f5f5;
    }

    .action-link {
        color: #00acc1; /* Teal action link color */
        text-decoration: none;
        font-weight: bold;
    }

    .action-link:hover {
        text-decoration: underline;
    }

    .edit-link {
        color: #2196F3;
    }

    .delete-link {
        color: #FF5722;
    }
</style>

</head>
<body>
    <div class="container">
        <div class="header">
            <h1><a href="<?= base_url(); ?>/management">Store Management</a></h1>
        </div>
        <hr>
        <div class="content">
            <div class="form-section">
                <?php if(isset($msg)):?>
                    <div class="message">
                        <h4><?= $msg; ?></h4>
                    </div>
                <?php endif;?>
                <form action="/save" method="post">
                    <input type="hidden" name="id" value="<?= isset($selected['id']) ? $selected['id'] : ''; ?>">

                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" name="name" value="<?= isset($selected['name']) ? $selected['name'] : ''; ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description:</label>
                        <input type="text" name="description" value="<?= isset($selected['description']) ? $selected['description'] : ''; ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" value="<?= isset($selected['price']) ? $selected['price'] : ''; ?>" required />
                    </div>
                    <div class="submit-button">
                        <input type="submit" value="Submit" />
                    </div>
                </form>
            </div>
            <div class="table-section">
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Price</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <?php foreach($products as $val): ?>
                        <tr>
                            <td><?= $val['name']; ?></td>
                            <td><?= $val['description']; ?></td>
                            <td><?= $val['price']; ?></td>
                            <td><a href="<?= base_url(); ?>/edit/<?= $val['id']; ?>" class="action-link edit-link">Edit</a></td>
                            <td><a href="<?= base_url(); ?>/delete/<?= $val['id']; ?>" class="action-link delete-link">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
