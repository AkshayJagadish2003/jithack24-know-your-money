<!DOCTYPE HTML>
<html>
<head>  
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        height: 100vh;
        background: linear-gradient(to right, #ece9e6, #ffffff);
    }
    .nav-tabs {
        display: flex;
        justify-content: space-around;
        background-color: #007bff;
        border-radius: 8px 8px 0 0;
        padding: 14px 0;
        overflow: hidden;
    }
    .nav-tabs a {
        flex: 1;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s;
    }
    .nav-tabs a:hover {
        background-color: #0056b3;
    }
    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        height: calc(100% - 60px); /* Adjusted to account for the height of the nav-tabs */
        width: 100%;
        gap: 10px;
        padding: 20px;
    }
    .upper-half, .lower-left, .lower-right {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }
    .upper-half {
        grid-column: 1 / 3;
        grid-row: 1 / 2;
        flex-direction: column;
    }
    .lower-left {
        grid-column: 1 / 2;
        grid-row: 2 / 3;
        height: 100%; /* Ensure the lower-left div takes up the entire height */
    }
    .lower-right {
        grid-column: 2 / 3;
        grid-row: 2 / 3;
    }
    #chartContainer {
        width: 100%; /* Ensure the chart takes up the entire width */
        height: 100%; /* Ensure the chart takes up the entire height */
    }
    .field {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    .field label {
        width: 120px;
        margin-right: 10px;
    }
    .field input[type="text"],
    .field input[type="date"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 200px;
        transition: border-color 0.3s;
    }
    .field input[type="text"]:focus,
    .field input[type="date"]:focus {
        outline: none;
        border-color: #007bff;
    }
    .calculate-btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .calculate-btn:hover {
        background-color: #0056b3;
    }
</style>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Simple Column Chart with Index Labels"
    },
    axisY:{
        includeZero: true
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        //indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        indexLabelPlacement: "outside",   
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();

}
</script>
</head>
<body>
<div class="nav-tabs">
    <a href="#">Tab 1</a>
    <a href="#">Tab 2</a>
    <a href="#">Tab 3</a>
</div>
<div class="container">
    <div class="upper-half">
        <div class="field">
            <label for="market">Market:</label>
            <input type="text" id="market" name="market">
        </div>
        <div class="field">
            <label for="acres">No of Acres:</label>
            <input type="text" id="acres" name="acres">
        </div>
        <div class="field">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
        </div>
        <button class="calculate-btn" onclick="calculate()">Calculate</button>
    </div>
    <div class="lower-left">
        <div id="chartContainer"></div>
    </div>
    <div class="lower-right">
        <!-- Additional content for the lower right half can go here -->
        <p>Lower Right Content</p>
    </div>
</div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>
