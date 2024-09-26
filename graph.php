<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Graph</title>
  <link rel="stylesheet" href="style.css">
 

    <style>
        
        input{
                display: inline-block;
                margin: ;
        }
        .input-group{
            display: flex;
            padding: 10px;
        } 

        button{
            position:  relative;
                left: 2em;
        }
    </style>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Add Chart.js library -->
</head>
<body>



<div class="container">
    <canvas id="healthGraph" width="400" height="200"></canvas>
</div>

<form id="health-form" class="container">
    <div class="input-group">
        <label for="bpm">BPM</label>
        <input type="number" id="bpm" name="bpm" placeholder="Enter BPM">
    </div>
    <div class="input-group">
        <label for="spo2">SPO2</label>
        <input type="number" id="spo2" name="spo2" placeholder="Enter SPO2">
    </div>
    <button type="submit">Submit</button>
</form>

<script>
    // Function to generate and display graph
    function generateGraph(bpmData, spo2Data) {
        const ctx = document.getElementById('healthGraph').getContext('2d');
        const labels = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'];

        const healthGraph = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'BPM',
                    data: bpmData,
                    borderColor: 'rgb(255, 99, 132)',
                    fill: false
                }, {
                    label: 'SPO2',
                    data: spo2Data,
                    borderColor: 'rgb(54, 162, 235)',
                    fill: false
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    // Call function to generate and display graph when page loads
    window.onload = function() {
        // Dummy data for demonstration purposes
        const bpmData = [80, 85, 90, 88, 87, 92, 95];
        const spo2Data = [95, 94, 93, 92, 91, 90, 89];
        generateGraph(bpmData, spo2Data);
    }

    // Form submission event listener
    const healthForm = document.getElementById('health-form');
    healthForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Get BPM and SPO2 values from form
        const bpm = parseInt(document.getElementById('bpm').value);
        const spo2 = parseInt(document.getElementById('spo2').value);

        // Update graph with new data
        const newData = [bpm, spo2];
        updateGraph(newData);
    });

    // Function to update graph with new data
    function updateGraph(newData) {
        const healthGraph = Chart.getChart('healthGraph');

        // Add new data to the datasets
        healthGraph.data.datasets.forEach((dataset, index) => {
            dataset.data.push(newData[index]);
        });

        // Remove the first element from labels array
        healthGraph.data.labels.shift();
        // Add a new label for the next day
        const today = new Date();
        const dayOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const label = dayOfWeek[today.getDay()];
        healthGraph.data.labels.push(label);

        // Update the chart
        healthGraph.update();
    }
</script>

</body>
</html>
