$(document).ready(function() {

    
    var departmentB = document.getElementById("departmentB");
    var departmentBChart = new Chart(departmentB, {
        type: 'pie',
        data: {
            labels: [
                "Completed",
                "Un-completed",
                "Overdue"
            ],
            datasets: [{
                data: [70, 30, 0],
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
    
    var departmentC = document.getElementById("departmentC");
    var departmentCChart = new Chart(departmentC, {
        type: 'pie',
        data: {
            labels: [
                "Completed",
                "Un-completed",
                "Overdue"
            ],
            datasets: [{
                data: [10, 30, 5],
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
    
    
    


   
});