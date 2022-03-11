<template>


            <div class="dropdown">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-bell   
"></span>Request <span class="badge">{{unreads.length}}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <h4>Requests</h4>



                   
                </div>
            </div>
</template>

<script>
    export default {
    props:['unreads','userid'],
        mounted() {
            console.log('Component mounted.');

            Echo.private('App.User.' + this.userid)
                 .notification((notification) => {
                 console.log(notification);
    });
        }
    }
</script>
