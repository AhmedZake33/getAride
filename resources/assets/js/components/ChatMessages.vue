
<template>
    <ul class="chat">
              
        <li class="left clearfix" v-for="message in messages">
        

            <div  class="chat-body clearfix">
                <div class="header">
              

                

                    <img :src="message.user.profile_pic">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <small>
                    {{ message.message }}
                </small>
            </div>   

         
        </li>


    </ul>

   
</template>

<script>

  export default {
    props: ['messages']
  };

</script>