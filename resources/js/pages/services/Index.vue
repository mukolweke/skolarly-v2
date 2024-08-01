<script setup>
import { defineAsyncComponent, ref } from 'vue';
import { ArrowRightIcon } from '@heroicons/vue/20/solid'

const BannerIntro = defineAsyncComponent(() => import('../../components/banner/Intro.vue'));

const services = [
  {
    name: 'business consulting services',
    items: [
      { "name": "Company Registration", "description": "Assistance with the legal process of registering a new company." },
      { "name": "Business Names", "description": "Guidance on selecting and registering a business name." },
      { "name": "Associations", "description": "Helping form and register business associations." },
      { "name": "Change of BN to Ltd", "description": "Converting a Business Name (BN) to a Limited (Ltd) company." },
      { "name": "Change of Directors", "description": "Legal process of changing company directors." },
      { "name": "Reallocation of Shares", "description": "Assistance in reallocating company shares." },
      { "name": "AGPO & CR12", "description": "Processing of AGPO and CR12 documents." },
      { "name": "Annual Registrar Returns", "description": "Filing annual returns with the registrar." }
    ]
  },
  {
    name: 'research services',
    items: [
      { "name": "Concept Papers", "description": "Writing foundational documents for research projects." },
      { "name": "Proposal Writing", "description": "Crafting detailed research proposals." },
      { "name": "Data Collection", "description": "Gathering data through various methodologies." },
      { "name": "Data Analysis", "description": "Analyzing collected data using statistical tools." },
      { "name": "Report Writing", "description": "Composing detailed research reports." },
      { "name": "Plagiarism (Turnitin)", "description": "Checking documents for plagiarism using Turnitin." },
      { "name": "Training (SPSS, R, STATA)", "description": "Providing training in statistical software like SPSS, R, and STATA." },
      { "name": "Research Papers", "description": "Writing and reviewing academic research papers." },
      { "name": "Baseline Surveys", "description": "Conducting initial surveys to establish benchmarks." },
      { "name": "Market Research", "description": "Researching market conditions and trends." },
      { "name": "Opinion Polls", "description": "Conducting surveys to gauge public opinion." },
      { "name": "Employee Satisfaction Surveys", "description": "Assessing employee satisfaction levels." },
      { "name": "Customer Satisfaction Surveys", "description": "Measuring customer satisfaction levels." }
    ]
  },
  {
    name: 'design & registration services',
    items: [
      { "name": "Web & Logo Design", "description": "Creating professional websites and logos." },
      { "name": "Business Cards", "description": "Designing and printing business cards." },
      { "name": "Company Profiles", "description": "Developing detailed profiles for businesses." },
      { "name": "Seals & Stamps", "description": "Creating official seals and stamps." },
      { "name": "NCA Application", "description": "Assisting with applications for the National Construction Authority (NCA)." },
      { "name": "Updating B.O Status", "description": "Updating Beneficial Ownership status." }
    ]
  }
];

</script>

<template>
  <!-- banner intro -->
  <BannerIntro title="Services." />

  <section class="bg-primary-darker">
    <div class="lx-container">
      <div class="py-10 md:py-20">
        <div
          v-for="(service, index) in services"
          :key="index"
          class="flex flex-col md:flex-row gap-5 md:gap-10 lg:gap-20 item-start"
          :class="{ 'border-b border-secondary-lighter mb-10': index !== services.length - 1 }"
        >
          <div class="w-full md:w-1/3">
            <div class="w-full">
              <p
                class="font-karla text-secondary-lighter flex items-center gap-2 mb-8 uppercase"
              >
                <span class="font-bold">-</span>
                <span class="font-karla">0{{ index + 1 }}</span>
              </p>

              <p class="mb-10 text-white text-3xl capitalize">
                {{ service.name }}
              </p>

              <p class="text-gray-400 font-karla mb-10">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem
                ipsum dolor sit amet, consectetur adipisicing elit.
              </p>

              <div class="flex items-center justify-start mb-10 gap-5 md:gap-10 lg:gap-20">
                <router-link
                    to="/works"
                    class="font-bold text-right text-secondary-lighter text-xs tracking-wider leading-loose underline underline-offset-4 flex items-center gap-2"
                  >
                    <span>View works</span>
                    <ArrowRightIcon class="size-5" />
                  </router-link>

                  <router-link
                    to="/contact"
                    class="font-bold text-right text-secondary-lighter text-xs tracking-wider leading-loose underline underline-offset-4 flex items-center gap-2"
                  >
                    <span>Get a quote</span>
                    <ArrowRightIcon class="size-5" />
                  </router-link>
              </div>
            </div>
          </div>

          <div class="md:w-2/3">
            <div
              class="w-full md:ml-auto bg-primary-darker h-full md:pt-10 rounded-md overflow-hidden"
            >
              <div
                v-for="(item, indx) in service.items"
                :key="indx"
                class="mb-8 pb-8"
                :class="{ 'border-b border-dashed border-gray-600': indx !== service.items.length - 1 }"
              >
                <p
                  class="font-karla text-gray-400 flex items-center gap-2 mb-2 uppercase"
                >
                  <span class="font-bold">-</span>
                  <span class="font-karla">{{ item.name }}</span>
                </p>

                <p class="text-white">{{ item.description }}</p>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>
</template>
