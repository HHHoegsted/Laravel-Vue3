<template>
	 <app-layout>
		  <template #header>
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					 Leads
				</h2>
		  </template>

		  <div class="py-12">
				<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
					<div class="bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg">
						<div class="text-xl">
							<h2>Show Lead</h2>
						</div>
						<form class="bg-white" @submit.prevent="handleSubmit">
							<table>
								<tr>
									<td><label for="name">Name</label></td>
									<td><input type="text" id="name" placeholder="Enter name" v-model="lead.name" tabindex="1"></td>
								</tr>
								<tr>
									<td><label for="email">Email</label></td>
									<td><input type="text" id="email" placeholder="Enter email" v-model="lead.email" tabindex="2"></td>
								</tr>
								<tr>
									<td><label for="phone">Phone Number</label></td>
									<td><input type="text" id="phone" placeholder="Enter phone number" v-model="lead.phone" tabindex="3"></td>
								</tr>
								<tr>
									<td><label for="dob">Birthday</label></td>
									<td><input type="date" id="dob" placeholder="Enter date of birth" v-model="lead.dob" tabindex="4"></td>
								</tr>
								<tr>
									<td><label for="package">Interested package</label></td>
									<td><input type="text" id="package" placeholder="Enter the package interested in" v-model="lead.interested_package" tabindex="5"></td>
								</tr>
							</table>
							<button type="submit">Update</button>
						</form>
					 </div>
				</div>
		  </div>
	 </app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout';

export default {
	components:{
		AppLayout,
	},
	props:{
		incLead : Object
	},
	data(){
		return{
			lead:{
				name:'',
				email:'',
				phone:'',
				dob:'',
				interested_package:'',
			}
		}
	},
	created(){
		this.lead = this.incLead;
		console.log(this.incLead);
	},
	methods: {
	async handleSubmit(){
			let response = await this.$inertia.post('/leads/update', this.lead);
		}
	}
}
</script>

<style scoped>
h2{
	margin: 5px 10px;
}
table{
	margin: 5px 10px;
}
td{
	padding: 5px 5px;
}
label{
	margin-right: 20px;
}
input{
	width: 300px;
}
button{
	background: green;
	color: white;
	margin: 5px 10px;
	padding: 5px 15px;

}
</style>
