function newYear() {
    if (confirm("Ви впевнені?")) {
        document.location.href  = '../views/students-list.php?newYear=true' ;
    }
}