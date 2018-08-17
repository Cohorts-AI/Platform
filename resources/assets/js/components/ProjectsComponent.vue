<template>
    <div class="row">
			
			  <div v-if="modal" class="we-modal">
					<div v-if="active != ''" class="modal-inner">
            <svg v-on:click="toggle" id="modal-close" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" x="0px" y="0px" viewBox="0 0 100 125"><g transform="translate(0,-952.36218)"><path style="font-size:medium;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-indent:0;text-align:start;text-decoration:none;line-height:normal;letter-spacing:normal;word-spacing:normal;text-transform:none;direction:ltr;block-progression:tb;writing-mode:lr-tb;text-anchor:start;baseline-shift:baseline;opacity:1;color:#000000;fill:#000000;fill-opacity:1;stroke:none;stroke-width:2;marker:none;visibility:visible;display:inline;overflow:visible;enable-background:accumulate;font-family:Sans;-inkscape-font-specification:Sans" d="M 12.875 11.96875 A 1.0001 1.0001 0 0 0 12.28125 13.6875 L 48.5625 50 L 12.28125 86.28125 A 1.0054956 1.0054956 0 1 0 13.71875 87.6875 L 50 51.40625 L 86.28125 87.6875 A 1.0054956 1.0054956 0 0 0 87.71875 86.28125 L 51.4375 50 L 87.71875 13.6875 A 1.0001 1.0001 0 0 0 86.96875 11.96875 A 1.0001 1.0001 0 0 0 86.28125 12.28125 L 50 48.5625 L 13.71875 12.28125 A 1.0001 1.0001 0 0 0 12.875 11.96875 z " transform="translate(0,952.36218)"/></g></svg>
						<h1 v-if="active.fields.Name">{{ active.fields.Name }}</h1>
						<h3 v-if="active.fields.URL">{{ active.fields.URL }}</h3>
            <img v-if="active.fields.Hero" v-bind:src="active.fields.Hero[0].url" />
            <div class="row">
                <div class="services col-md-4">
                    <ul>
                     <li v-for="service in active.fields.Services">{{ service }}</li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <p>{{ active.fields.Markdown }}</p>
                </div>
            </div>
					</div>
				</div>
	
				<h1 v-on:click="select(project)" v-for="project in projects" v-if="project.fields.Name" v-bind:class="{ active : project.active }"><a href="#">{{ project.fields.Name }}</a> <small><span class="more">↳</span> to view</small></h1>

		</div>
</template>
 
<script>
	
    export default {
			  data: function() {
         return  {
					 projects: '',
					 current: 0,
					 active: '',
           modal: false
				 }
				},
        mounted() {			
          this.fetchProjects();
					this.noScroll();
					
					this.$nextTick(function () {
						window.addEventListener('scroll', this.noScroll);
						this.navInit();
					});
        },
			  methods: {
            
          select: function(project) {
              if(project.active == false) {
                  this.scrollTo(project);
              } else {
                  this.toggle();
              }
          },
					
          toggle: function() {
              if(this.modal == true) {
                  this.modal = false;
              } else {
                  this.modal = true;
              }
          },
            
					fetchProjects: function() {
						var parent = this;
						
						$.ajax({
							type:'GET',
							url: '/api/projects/',
							dataType: 'json',
							async: false,
							success : function(data) {
								parent.projects = data.projects;
							}
						});
					},
					 
					noScroll: function() {
  					window.scrollTo( 0, 0 );
					},
					
					navInit: function() {
						var parent = this;
						var lastScrollPosition = 0;
						
						this.$set(this.projects[0], 'active', true);
						this.active = this.projects[0];
              
            document.onkeydown = function() {
             var keycode = window.event.keyCode;
              if ( keycode == 13 ) {
                parent.toggle();
              } else if (keycode == 40) {
                parent.scrollDown();
              } else if (keycode == 38) {
                parent.scrollUp();  
              }
            };
						
						window.addEventListener('wheel', function(e) {
							if (e.deltaY < 0) {
								parent.scrollUp();
							}
							if (e.deltaY > 0) {
								parent.scrollDown();
							}
						});
						
					},
					
          scrollTo: function(project) {
              var parent = this;
              
              this.projects.forEach(function(p){
                  if(project.id == p.id) {
                      parent.current = parent.projects.map(function(e) { return e.id; }).indexOf(p.id);
                      parent.active = p;
                      parent.$set(parent.projects[parent.current], 'active', true);
                      
                      parent.toggle();
                  } else {
                      p.active = false;
                  }
              });
          },
            
					scrollDown: _.throttle(function() {
						if(this.current < this.projects.length) {
							this.$set(this.projects[this.current], 'active', false);
							this.$set(this.projects[this.current + 1], 'active', true);
							this.current = this.current + 1;
							this.active = this.projects[this.current];
							
							var wrapper = $('section.projects');
							wrapper.animate({top: '-=100px'}, {duration: 300});
						}
					}, 1000, {'trailing': false}),
					
					scrollUp: _.throttle(function() {
						if(this.current > 0) {
							this.$set(this.projects[this.current], 'active', false);
							this.$set(this.projects[this.current - 1], 'active', true);
							this.current = this.current - 1;
							this.active = this.projects[this.current];
							
							var wrapper = $('section.projects');
							wrapper.animate({top: '+=100px'}, {duration: 300});
						}
					}, 1000, {'trailing': false}),
					
				}
    }
</script>
