@extends('layouts.main')

@section('content')
	<h3 class="switcher">Connecting<br><br> <span v-on:click="switchForm('brand')" v-bind:class="{ 'active': activeSwitch('brand') }">Brands</span> & <span v-bind:class="{ 'active': activeSwitch('creative') }" v-on:click="switchForm('creative')">Creatives</span></h3>
    
		<section class="main_copy">
				<p class="brands-desc">Work with world class <b>designers</b>, <b>influencers</b>, <b>media professionals</b>, <b>strategists & technologists</b>.</p> 

				<p class="creatives-desc">
					Join an elite network of creatives<br>
					working to create the agency of the future.  

				</p>
		</section>
      
      <section id="onboard">
        <form v-if="confirm == false" @submit.prevent="processForm">

            <span class="form-wrap"><input name="project" v-model="project" autofocus placeholder="What do you want to build today?"></span>
      
            <span class="form-wrap"><input type="email" name="email" v-model="email" placeholder="What's your email?"></span>
        
            <button type="submit">JOIN US</button>
        </form>
        <h3 v-if="confirm">Your message has been sent and we will be in touch shortly!</h3>
      </section>
@endsection