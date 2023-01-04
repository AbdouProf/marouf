<script>
    Chart.defaults.global.defaultFontFamily = "Nunito";
    var demandes =  <?php echo json_encode($demandes) ?> ;

    var config = {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Nombre demandes",
                    backgroundColor: "rgba(255,138,0,0.08)",
                    borderColor: "#ff8a00",
                    borderWidth: "3",
                    data: demandes,
                    pointRadius: 4,
                    titleFontSize: 18,
                    pointHoverRadius: 4,
                    pointHitRadius: 10,
                    pointBackgroundColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointBorderWidth: "3",
                },
            ],
        },
        options: {
            responsive: true,
            tooltips: {
                backgroundColor: "#333",
                titleFontSize: 15,
                titleFontColor: "#fff",
                bodyFontColor: "#fff",
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false,
            },

            legend: { display: false },
            title: { display: false },

            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: "Month",
                    },
                   
                },
                y: {
                    type: "category",
                    position: "left",
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: "Request State",
                    },
                    reverse: true,
                },
            },
        },
    };
    window.onload = function () {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);
    };
</script>