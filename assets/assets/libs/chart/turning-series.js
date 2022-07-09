$(function() {
    var datasets = {
        "norway": {
            label: "Norway",
            data: [
                [1988, 4382],
                [1989, 4498],
                [1990, 4535],
                [1991, 4398],
                [1992, 4766],
                [1993, 4441],
                [1994, 4670],
                [1995, 4217],
                [1996, 4275],
                [1997, 4203],
                [1998, 4482],
                [1999, 4506],
                [2000, 4358],
                [2001, 4385],
                [2002, 5269],
                [2003, 5066],
                [2004, 5194],
                [2005, 4887],
                [2006, 4891]
            ]
        }
    };
   /* var dataSet = [
    {label: "USA", color: "#005CDE" },
    {label: "Russia", color: "#005CDE" },
    { label: "UK", color: "#00A36A" },
    { label: "Germany", color: "#7D0096" },
    { label: "Denmark", color: "#992B00" },
    { label: "Sweden", color: "#DE000F" },
    { label: "Norway", color: "#ED7B00" }    
];*/
    // hard-code color indices to prevent them from shifting as
    // countries are turned on/off
    var i = 0;
    $.each(datasets, function(key, val) {
        val.color = i;
        ++i;
    });

    // // insert checkboxes 
    // var choiceContainer = $("#choices");
    // $.each(datasets, function(key, val) {
    //     choiceContainer.append('<input type="checkbox" name="' + key +
    //         '" checked="checked" id="id' + key + '">' +
    //         '<label for="id' + key + '">' +
    //         val.label + '</label>');
    // });
    // choiceContainer.find("input").click(plotAccordingToChoices);


    // function plotAccordingToChoices() {
    //     var data = [];

    //     choiceContainer.find("input:checked").each(function() {
    //         var key = $(this).attr("name");
    //         if (key && datasets[key])
    //             data.push(datasets[key]);
    //     });

    //     if (data.length > 0)
    //         $.plot($("#placeholder"), data, {
    //             yaxis: { min: 0 },
    //             xaxis: { tickDecimals: 0 }
    //         });
    // }

    //plotAccordingToChoices();
});