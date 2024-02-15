<style>
    /* #calendar{
  position: absolute;
  width: 700px;
  left: 32px;
  right: 32px;
  height: 500px;
  top: 171px;
  border-style: solid;
   border-color: rgb(17, 95, 89);
  border-width: 5px;
  border-radius: 10px;
  margin-left: 32px;
  margin-top: 550px; 
  }*/
.fc button {
    text-transform: uppercase;
}
   #calendar{
  position: absolute;
  width: 780px;
  height: 630px;
  top: 100px;
  border-style: solid;
  border-color: rgb(17, 95, 89);
  border-width: 6px;
  border-radius: 10px;
  margin-left: 20px;
  margin-top: 50px;
    }

@media screen and (max-width: 400px) {
   #calendar{
  position: absolute;
  width: 340px;
  left: 10px;
  top: 150px;
  height: 304px;
  border-style: solid;
  border-color: rgb(17, 95, 89);
  border-width: 5px;
  border-radius: 10px;
  margin-left: 0px;
  margin-top: 25px;
   }
}
    /* @media screen and (max-width: 400px) {
        position: absolute;
  width: 200px;
  height: 400px;
  border-style: solid;
   border-color: rgb(17, 95, 89);
  border-width: 5px;
  border-radius: 10px;
  margin-left: 32px;
  margin-top: 900px;
    } */
</style>
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href='fullcalendar/main.css' rel='stylesheet' /> -->
    <script src='fullcalendar/main.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today'
                },
                events: 'fetch-cal-event.php',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt("Enter Event Title");
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: "insert.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Added Successfully");
                            }
                        })
                    }
                },
                editable: true,
                eventResize: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "update.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert('Event Update');
                        }
                    })
                },
                eventDrop: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "update.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated");
                        }
                    });
                },
                eventClick: function(event) {
                    // Check user type
                    $.ajax({
                        url: "check-user-type.php",
                        type: "POST",
                        data: { user_id: <?php echo $_SESSION['user_id']; ?> },
                        success: function(userType) {
                            if (userType === "Student") {
                                alert("You don't have permission to edit this event.");
                                return;
                            }
                            
                            // Prompt user for new event details
                            var id = event.id;
                            var title = event.title;
                            var start = event.start.format();
                            var end = event.end.format();
                            var eventData = {
                                id: id,
                                title: title,
                                start: start,
                                end: end,
                            };
                            var newTitle = prompt("Please enter a new title for the event", title);
                            if (newTitle) {
                                eventData.title = newTitle;
                                var newStart = prompt("Please enter a new start date and time for the event in YYYY-MM-DD HH:mm:ss format", start);
                                if (newStart) {
                                    eventData.start = newStart;
                                    var newEnd = prompt("Please enter a new end date and time for the event in YYYY-MM-DD HH:mm:ss format", end);
                                    if (newEnd) {
                                        eventData.end = newEnd;
                                        $.ajax({
                                            url: "edit-cal-event.php",
                                            type: "POST",
                                            data: eventData,
                                            success: function() {
                                                calendar.fullCalendar('refetchEvents');
                                                alert("Event updated");
                                            }
                                        });
                                    }
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>
    <style>

    </style>
</head>

<body>
    <div id='calendar'></div>
</body>

</html>