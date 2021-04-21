<template>
	<app-layout>
		<template #header>
			<div class="flex w-full">
				<div class="float-left w-1/2">
					<h2 class="font-semibold text-xl text-gray-800 leading-tight">
							Leads
					</h2>
				</div>
				<div class="w-1/2">
					<button class="float-right py-2 px-4 rounded bg-blue-500 hover:bg-blue-700 text-white">Add Lead</button>
				</div>
			</div>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<div class="flex flex-wrap overflow-hidden">
						<div class="w-full overflow-hidden w-full">
							<table class="min-w-full divide-y divide-gray-200">
								<thead class="bg-gray-50">
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birthday</th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Package</th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
									<th></th>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr v-for="lead in leads" :key="lead.id">
										<td class="px-6 py-4 whitespace-nowrap">{{ lead.id}}</td>
										<td class="px-6 py-4 whitespace-nowrap">{{ lead.name }}</td>
										<td class="px-6 py-4 whitespace-nowrap">{{ lead.email }}</td>
										<td class="px-6 py-4 whitespace-nowrap">{{ lead.phone }}</td>
										<td class="px-6 py-4 whitespace-nowrap">{{ lead.dob }}</td>
										<td class="px-6 py-4 whitespace-nowrap">{{ lead.age }}</td>
										<td class="px-6 py-4 whitespace-nowrap">{{ lead.interested_package }}</td>
										<td class="px-6 py-4 whitespace-nowrap">{{ lead.created_at.split("T")[0] }}</td>
										<td class="px-6 py-4 whitespace-nowrap"> <inertia-link :href="route('leads.show',lead.id)">></inertia-link> </td>

									</tr>
								</tbody>
							</table>

						</div>
					</div>
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
	props:[
		'leads'
	]
}
</script>

<style scoped>

</style>
