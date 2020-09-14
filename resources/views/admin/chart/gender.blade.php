<canvas id="doughnut" width="200" height="200"></canvas>
<script>
    $(function () {

        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        {{ $gender['1'] }},
                        {{ $gender['2'] }},
                    ],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)'
                    ]
                }],
                labels: [
                    '男',
                    '女',
                    // 'Unknown'
                ]
            },
            options: {
                maintainAspectRatio: false
            }
        };

        var ctx = document.getElementById('doughnut').getContext('2d');
        new Chart(ctx, config);
    });
</script>
