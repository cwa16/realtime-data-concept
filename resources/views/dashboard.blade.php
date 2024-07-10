<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>
<body>
    <div id="app">
        <h1>Sales Dashboard</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>@{{ sales.length }}</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="sale in sales" :key="sale.id">
                    <td>@{{ sale.product }}</td>
                    <td>@{{ sale.quantity }}</td>
                    <td>@{{ sale.price }}</td>

                </tr>
            </tbody>
        </table>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                sales: []
            },
            created() {
                this.fetchData();
                setInterval(this.fetchData, 1000); // Refresh data every 5 seconds
            },
            methods: {
                fetchData() {
                    axios.get('/live-data')
                        .then(response => {
                            this.sales = response.data;
                        });
                }
            }
        });
    </script>
</body>
</html>
