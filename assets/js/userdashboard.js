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
        //Graph JS
        // Replace PHP echo with JavaScript variables for demonstration
        var municipalApplicants = 150; // Example data
        var availableSlots = 50;       // Example data
    
        var ctx = document.getElementById('doughnut').getContext('2d');
    
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Approved Applicants', 'Remaining Slots'],
                datasets: [{
                    data: [municipalApplicants, availableSlots],
                    backgroundColor: [
                        'rgba(5, 55, 116, 1)',
                        'rgba(32, 156, 72, 1)'
                    ],
                    borderColor: [
                        'rgba(5, 55, 116, 1)',
                        'rgba(32, 156, 72, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            var label = data.labels[tooltipItem.index] || '';
                            var value = data.datasets[0].data[tooltipItem.index];
                            return label + ': ' + value;
                        }
                    }
                }
            }
        });