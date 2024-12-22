<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Restaurant Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #ff4757;
            --secondary: #2f3640;
            --success: #2ed573;
            --warning: #ffa502;
            --danger: #ff4757;
            --light: #f1f2f6;
            --dark: #2f3640;
        }

        body {
            background: #f8f9fa;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Enhanced Sidebar Styling */
        .sidebar {
            width: 280px;
            background: var(--dark);
            color: white;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 2rem;
        }

        .sidebar-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 1rem;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }

        .nav-link i {
            margin-right: 1rem;
            width: 20px;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            padding: 2rem;
            background: #f8f9fa;
        }

        /* Enhanced Header */
        .main-header {
            background: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Dashboard Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        /* Enhanced Tables */
        .data-table {
            width: 100%;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .data-table th,
        .data-table td {
            padding: 1rem;
            text-align: left;
        }

        .data-table thead {
            background: var(--dark);
            color: white;
        }

        .data-table tbody tr:hover {
            background: #f8f9fa;
        }

        /* Buttons */
        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        /* Forms */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-top: 0.5rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
        }

        /* Charts Container */
        .charts-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .chart-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="/api/placeholder/80/80" alt="Restaurant Logo">
                <h2>Restaurant Admin</h2>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showSection('dashboard')">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showSection('menu')">
                        <i class="fas fa-utensils"></i>
                        Menu Management
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showSection('reservations')">
                        <i class="fas fa-calendar-alt"></i>
                        Reservations
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showSection('orders')">
                        <i class="fas fa-shopping-cart"></i>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showSection('inventory')">
                        <i class="fas fa-box"></i>
                        Inventory
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showSection('staff')">
                        <i class="fas fa-users"></i>
                        Staff Management
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showSection('reports')">
                        <i class="fas fa-chart-bar"></i>
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showSection('settings')">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="main-header">
                <h1 id="page-title">Dashboard Overview</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="toggleNotifications()">
                        <i class="fas fa-bell"></i>
                        Notifications
                    </button>
                </div>
            </div>

            <div id="dashboard-section">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: rgba(255,71,87,0.1); color: var(--primary)">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Today's Reservations</h3>
                        <h2>24</h2>
                        <p>+12% from yesterday</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: rgba(46,213,115,0.1); color: var(--success)">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h3>Today's Revenue</h3>
                        <h2>$2,415</h2>
                        <p>+8% from yesterday</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: rgba(255,165,2,0.1); color: var(--warning)">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3>Pending Orders</h3>
                        <h2>18</h2>
                        <p>4 require attention</p>
                    </div>
                </div>

                <div class="charts-container">
                    <div class="chart-card">
                        <h3>Revenue Overview</h3>
                        <div id="revenue-chart"></div>
                    </div>
                    <div class="chart-card">
                        <h3>Popular Items</h3>
                        <div id="items-chart"></div>
                    </div>
                </div>
            </div>

            <!-- Additional Sections -->
            <div id="inventory-section" style="display: none;">
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="inventory-tbody">
                            <!-- Dynamically populated -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="staff-section" style="display: none;">
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Schedule</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="staff-tbody">
                            <!-- Dynamically populated -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modals -->
    <div id="add-item-modal" class="modal">
        <div class="modal-content">
            <h2>Add New Item</h2>
            <form id="add-item-form">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="starters">Starters</option>
                        <option value="main">Main Course</option>
                        <option value="desserts">Desserts</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Item</button>
            </form>
        </div>
    </div>

    <script>
        // Navigation
        function showSection(sectionName) {
            // Hide all sections
            document.querySelectorAll('main > div[id$="-section"]').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show selected section
            const section = document.getElementById(sectionName + '-section');
            if (section) {
                section.style.display = 'block';
            }
            
            // Update page title
            document.getElementById('page-title').textContent = 
                sectionName.charAt(0).toUpperCase() + sectionName.slice(1);

            // Load section-specific data
            loadSectionData(sectionName);
        }

        // Data Loading
        function loadSectionData(section) {
            switch(section) {
                case 'inventory':
                    loadInventoryData();
                    break;
                case 'staff':
                    loadStaffData();
                    break;
                // Add more cases as needed
            }
        }

        // Sample Data Loading Functions
        function loadInventoryData() {
            const inventoryData = [
                { item: 'Tomatoes', category: 'Vegetables', stock: 50, status: 'In Stock' },
                { item: 'Chicken Breast', category: 'Meat', stock: 30, status: 'Low Stock' },
                { item: 'Olive Oil', category: 'Pantry', stock: 15, status: 'Critical' }
            ];

            const tbody = document.getElementById('inventory-tbody');
            tbody.innerHTML = inventoryData.map(item => `
                <tr>
                    <td>${item.item}</td>
                    <td>${item.category}</td>
                    <td>${item.stock}</td>
                    <td>
                        <span class="status-badge ${item.status.toLowerCase().replace(' ', '-')}">
                            ${item.status}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            `).join('');
        }

        function loadStaffData() {
            const staffData = [
                { name: 'John Smith', role: 'Chef', schedule: 'Morning Shift', status: 'Active' },
                { name: 'Sarah Johnson', role: 'Server', schedule: 'Evening Shift', status: 'Active' },
                { name: 'Mike Wilson', role: 'Bartender', schedule: 'Night Shift', status: 'On Leave' }
            ];

            const tbody = document.getElementById('staff-tbody');
            tbody.innerHTML = staffData.map(staff => `
                <tr>
                    <td>${staff.name}</td>
                    <td>${staff.role}</td>
                    <td>${staff.schedule}</td>
                    <td>
                        <span class="status-badge ${staff.status.toLowerCase().replace(' ', '-')}">
                            ${staff.status}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="editStaff('${staff.name}')">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="manageSchedule('${staff.name}')">Schedule</button>
                    </td>
                </tr>
            `).join('');
        }

        // Analytics and Charts
        function initializeCharts() {
            // Revenue Chart
            const revenueData = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Monthly Revenue',
                    data: [30000, 35000, 32000, 38000, 40000, 42000],
                    borderColor: '#ff4757',
                    backgroundColor: 'rgba(255, 71, 87, 0.1)'
                }]
            };

            // Popular Items Chart
            const itemsData = {
                labels: ['Pizza', 'Burger', 'Pasta', 'Salad', 'Dessert'],
                datasets: [{
                    label: 'Orders',
                    data: [150, 120, 110, 90, 80],
                    backgroundColor: [
                        '#ff4757',
                        '#2ed573',
                        '#1e90ff',
                        '#ffa502',
                        '#a4b0be'
                    ]
                }]
            };

            // Initialize charts if charting library is available
            if (typeof Chart !== 'undefined') {
                new Chart('revenue-chart', {
                    type: 'line',
                    data: revenueData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                new Chart('items-chart', {
                    type: 'doughnut',
                    data: itemsData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }
        }

        // Inventory Management
        function updateInventoryItem(id, quantity) {
            // Update inventory item logic
            console.log(`Updating inventory item ${id} to quantity ${quantity}`);
            // Add API call here
        }

        function checkLowStock() {
            const lowStockThreshold = 20;
            // Check inventory levels
            // Send notifications for low stock items
        }

        // Staff Management
        function editStaff(name) {
            // Show staff edit modal
            console.log(`Editing staff member: ${name}`);
        }

        function manageSchedule(name) {
            // Show schedule management modal
            console.log(`Managing schedule for: ${name}`);
        }

        // Order Management
        function processOrder(orderId) {
            // Process order logic
            console.log(`Processing order: ${orderId}`);
        }

        function updateOrderStatus(orderId, status) {
            // Update order status logic
            console.log(`Updating order ${orderId} to status: ${status}`);
        }

        // Notification System
        let notifications = [];

        function addNotification(message, type = 'info') {
            notifications.push({
                id: Date.now(),
                message,
                type,
                timestamp: new Date()
            });
            updateNotificationBadge();
        }

        function updateNotificationBadge() {
            const unreadCount = notifications.filter(n => !n.read).length;
            const badge = document.querySelector('.notification-badge');
            if (badge) {
                badge.textContent = unreadCount;
                badge.style.display = unreadCount > 0 ? 'block' : 'none';
            }
        }

        // Modal Management
        function showModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'flex';
            }
        }

        function hideModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'none';
            }
        }

        // Report Generation
        function generateReport(type) {
            const reportData = {
                sales: calculateSalesData(),
                inventory: getInventoryStatus(),
                staff: getStaffMetrics()
            };
            
            console.log(`Generating ${type} report`, reportData);
            // Add export functionality (CSV, PDF, etc.)
        }

        // Utility Functions
        function formatCurrency(amount) {
            return new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD'
            }).format(amount);
        }

        function formatDate(date) {
            return new Intl.DateTimeFormat('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            }).format(date);
        }

        // Initialize Dashboard
        document.addEventListener('DOMContentLoaded', () => {
            showSection('dashboard');
            initializeCharts();
            loadInventoryData();
            
            // Set up periodic checks
            setInterval(checkLowStock, 300000); // Check every 5 minutes
            
            // Add demo notification
            addNotification('Welcome to the enhanced restaurant dashboard!', 'success');
        });
        
        </script>
</body>
</html>