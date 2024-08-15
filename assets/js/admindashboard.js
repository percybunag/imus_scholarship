// toggle nav-bar //
document.getElementById('toggle-btn').addEventListener('click', function () {
    const sideNav = document.getElementById('side-nav');
    const mainContent = document.getElementById('main-content');
    if (sideNav.classList.contains('hidden')) {
        sideNav.classList.remove('hidden');
        mainContent.classList.remove('shifted');
    } else {
        sideNav.classList.add('hidden');
        mainContent.classList.add('shifted');
    }
});

// Line Chart //
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('myLineChart').getContext('2d');

    const myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Over All Applicants Per Month',
                data: [0, 1500, 200, 2000, 1000, 2000, 3000],
                fill: false,
                borderColor: 'rgba(5, 57, 116)',
                backgroundColor: 'rgba(5, 57, 116)',
                tension: 0.1 // Adjusts the smoothness of the line
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        
                    }
                }
            },
        }
    });
});

// Bar Chart //
document.addEventListener('DOMContentLoaded', () => {
    const ctxBar = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Grade11','Grade12','1st year','2nd year','3rd year', '4th year' ],
            datasets: [{
                label: 'Applicants per Grade/Year Level',
                data: [0, 500, 1000, 1500, 2000, 2500, 3000],
                backgroundColor: 'rgba(5, 57, 116)',
                borderColor: 'rgba(5, 57, 116)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    // Doughnut Chart1 //
    const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
    const doughnutChart = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: ['Approved', 'Reject', 'Pending',],
            datasets: [{
                label: '',
                data: [300, 50, 100,],
                backgroundColor: [
                    'rgba(21, 156, 57)',
                    'rgba(179, 4, 4)',
                    'rgba(5, 57, 116)'
                    
                ],
                borderColor: [
                    'rgba(21, 156, 57)',
                    'rgba(179, 4, 4)',
                    'rgba(5, 57, 116)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
});

 // Doughnut Chart2 //
 const ctxDoughnut = document.getElementById('doughnutChart2').getContext('2d');
 const doughnutChart = new Chart(ctxDoughnut, {
     type: 'doughnut',
     data: {
         labels: ['Municipal', 'Gabay Guro', 'Sm Foundation', 'DOST-Scholarship', 'Inlife Foundation', 'Hawak kamay', 'Cebuana Foundation' ],
         datasets: [{
             label: '',
             data:  [100, 80, 50, 90, 50, 50, 120],
             backgroundColor: [
                'rgb(0, 84, 14)',
                'rgb(0, 130, 57)', 
                'rgb(68, 167, 94)',
                 'rgb(72, 202, 228)',
                'rgb(84, 149, 225)',
                'rgb(0, 104, 175',
                'rgb(0, 62, 127)',
             ],
             borderColor: [
                'rgb(0, 84, 14)',
                'rgb(0, 130, 57)', 
                'rgb(68, 167, 94)',
                'rgb(72, 202, 228)',
                'rgb(84, 149, 225)',
                'rgb(0, 104, 175',
                'rgb(0, 62, 127)',
             ],
             borderWidth: 1
         }]
     },
     options: {
         responsive: true,
         plugins: {
             legend: {
                 position: 'top'
             },
             tooltip: {
                 callbacks: {
                     label: function(tooltipItem) {
                         return tooltipItem.label + ': ' + tooltipItem.raw;
                     }
                 }
             }
         }
     }
 });
