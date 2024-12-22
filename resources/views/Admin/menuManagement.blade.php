<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Management</title>
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <!-- Sidebar content (same as your existing code) -->
        </aside>

        <main class="main-content">
            <div class="main-header">
                <h1 id="page-title">Menu Management</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="toggleNotifications()">
                        <i class="fas fa-bell"></i>
                        Notifications
                    </button>
                </div>
            </div>

            <div class="menu-management">
                <!-- Add Menu Item Button -->
                <button class="btn btn-success" onclick="openAddItemModal()">Add New Item</button>

                <!-- Menu Items Table -->
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="menu-tbody">
                            <!-- Dynamically populated -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Item Modal -->
    <div id="add-item-modal" class="modal">
        <div class="modal-content">
            <h2>Add New Menu Item</h2>
            <form id="add-item-form" onsubmit="addMenuItem(event)">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="item-name" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" id="item-category" required>
                        <option value="starters">Starters</option>
                        <option value="main">Main Course</option>
                        <option value="desserts">Desserts</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" id="item-price" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Item</button>
                <button type="button" class="btn btn-secondary" onclick="closeAddItemModal()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Update Item Modal -->
    <div id="update-item-modal" class="modal">
        <div class="modal-content">
            <h2>Update Menu Item</h2>
            <form id="update-item-form" onsubmit="updateMenuItem(event)">
                <input type="hidden" id="update-item-id">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="update-item-name" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" id="update-item-category" required>
                        <option value="starters">Starters</option>
                        <option value="main">Main Course</option>
                        <option value="desserts">Desserts</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" id="update-item-price" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Item</button>
                <button type="button" class="btn btn-secondary" onclick="closeUpdateItemModal()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        // Mock data for menu items
        let menuItems = [
            { id: 1, name: 'Caesar Salad', category: 'starters', price: 7.99 },
            { id: 2, name: 'Grilled Chicken', category: 'main', price: 12.99 },
            { id: 3, name: 'Chocolate Cake', category: 'desserts', price: 5.99 },
        ];

        // Function to populate the menu table
        function populateMenu() {
            const menuTable = document.getElementById('menu-tbody');
            menuTable.innerHTML = '';

            menuItems.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.name}</td>
                    <td>${item.category}</td>
                    <td>$${item.price}</td>
                    <td>
                        <button onclick="openUpdateItemModal(${item.id})">Edit</button>
                        <button onclick="deleteMenuItem(${item.id})">Delete</button>
                    </td>
                `;
                menuTable.appendChild(row);
            });
        }

        // Function to open the Add Item Modal
        function openAddItemModal() {
            document.getElementById('add-item-modal').style.display = 'block';
        }

        // Function to close the Add Item Modal
        function closeAddItemModal() {
            document.getElementById('add-item-modal').style.display = 'none';
        }

        // Function to add a new menu item
        function addMenuItem(event) {
            event.preventDefault();

            const name = document.getElementById('item-name').value;
            const category = document.getElementById('item-category').value;
            const price = document.getElementById('item-price').value;

            const newItem = {
                id: menuItems.length + 1,
                name: name,
                category: category,
                price: parseFloat(price),
            };

            menuItems.push(newItem);
            populateMenu();
            closeAddItemModal();
        }

        // Function to open the Update Item Modal
        function openUpdateItemModal(id) {
            const item = menuItems.find(item => item.id === id);
            if (item) {
                document.getElementById('update-item-id').value = item.id;
                document.getElementById('update-item-name').value = item.name;
                document.getElementById('update-item-category').value = item.category;
                document.getElementById('update-item-price').value = item.price;
                document.getElementById('update-item-modal').style.display = 'block';
            }
        }

        // Function to close the Update Item Modal
        function closeUpdateItemModal() {
            document.getElementById('update-item-modal').style.display = 'none';
        }

        // Function to update the menu item
        function updateMenuItem(event) {
            event.preventDefault();

            const id = parseInt(document.getElementById('update-item-id').value);
            const name = document.getElementById('update-item-name').value;
            const category = document.getElementById('update-item-category').value;
            const price = parseFloat(document.getElementById('update-item-price').value);

            const index = menuItems.findIndex(item => item.id === id);
            if (index !== -1) {
                menuItems[index] = { id, name, category, price };
                populateMenu();
                closeUpdateItemModal();
            }
        }

        // Function to delete a menu item
        function deleteMenuItem(id) {
            const index = menuItems.findIndex(item => item.id === id);
            if (index !== -1) {
                menuItems.splice(index, 1);
                populateMenu();
            }
        }

        // Initialize the menu table
        populateMenu();
    </script>
</body>
</html>
