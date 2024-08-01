<script setup>
	import { ref, onMounted, onUnmounted } from 'vue'

	import { ArrowUpIcon } from '@heroicons/vue/20/solid'

	const showButton = ref(false)

	const handleScroll = () => {
		showButton.value = window.scrollY > 600
	}

	const scrollToTop = () => {
		window.scrollTo({ top: 0, behavior: 'smooth' })
	}

	onMounted(() => {
		window.addEventListener('scroll', handleScroll)
	})

	onUnmounted(() => {
		window.removeEventListener('scroll', handleScroll)
	})
</script>

<template>
	<!-- Blog content -->
	<section class="bg-primary-darker">
		<div class="container lg:max-w-4xl mx-auto px-6 xl:px-0 py-10 md:py-20">
			<div class="text-gray-300 text-xl leading-loose tracking-normal">
				<header class="mb-8 select-none">
					<h1 class="text-4xl font-bold mb-4">
						The Art of Online Writing: Tips and Tricks for Aspiring
						Writers
					</h1>
				</header>

				<section class="h-96 rounded-md overflow-hidden mb-8">
					<img
						src="https://images.pexels.com/photos/955389/pexels-photo-955389.jpeg?auto=compress&cs=tinysrgb&w=600"
						alt="Blog Background"
						class="w-full h-full object-cover z-0"
					/>
				</section>

				<section
					class="flex items-center space-x-4 text-secondary-lighter pb-8 font-semibold font-karla select-none"
				>
					<p>Alex</p>
					<p>.</p>
					<p>Jan 26 2024</p>
				</section>

				<main class="select-none">
					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							Introduction
						</h2>
						<p>
							In today's digital age, online writing has become a
							vital skill for anyone looking to share their
							thoughts, promote their business, or simply engage
							with a global audience. Whether you're blogging,
							creating social media content, or writing articles,
							mastering the art of online writing can open doors
							to countless opportunities. In this blog, we'll
							explore some essential tips and tricks to help you
							become a proficient online writer.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							1. Know Your Audience
						</h2>
						<p>
							Understanding your target audience is the first step
							in creating compelling content. Ask yourself:
						</p>
						<ul class="list-disc list-inside ml-4">
							<li>Who are they?</li>
							<li>What are their interests?</li>
							<li>What problems do they need solving?</li>
							<li>How can you add value to their lives?</li>
						</ul>
						<p>
							By answering these questions, you can tailor your
							content to meet their needs and expectations.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							2. Create Engaging Headlines
						</h2>
						<p>
							Your headline is the first thing readers see, so it
							needs to grab their attention. A compelling headline
							should be:
						</p>
						<ul class="list-disc list-inside ml-4">
							<li>
								<strong>Clear</strong>: Convey the main idea of
								your content.
							</li>
							<li>
								<strong>Concise</strong>: Keep it short and to
								the point.
							</li>
							<li>
								<strong>Intriguing</strong>: Pique the reader's
								curiosity.
							</li>
						</ul>
						<p>Examples:</p>
						<ul class="list-disc list-inside ml-4">
							<li>
								"10 Proven Strategies for Successful Online
								Writing"
							</li>
							<li>
								"How to Captivate Your Audience with Engaging
								Content"
							</li>
						</ul>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							3. Keep It Simple and Concise
						</h2>
						<p>
							Online readers often skim through content, so it's
							essential to keep your writing clear and concise.
							Avoid jargon and complex sentences. Instead, use
							simple language and short paragraphs to make your
							content easy to digest.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							4. Use Subheadings and Bullet Points
						</h2>
						<p>
							Breaking your content into smaller sections with
							subheadings and bullet points improves readability.
							This makes it easier for readers to find the
							information they're looking for quickly.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							5. Add Visual Elements
						</h2>
						<p>
							Incorporate images, infographics, and videos to
							enhance your content. Visual elements not only make
							your blog more appealing but also help explain
							complex ideas more effectively.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							6. Optimize for SEO
						</h2>
						<p>
							Search Engine Optimization (SEO) is crucial for
							increasing your content's visibility. Use relevant
							keywords naturally throughout your blog, and include
							meta descriptions, alt text for images, and internal
							and external links.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							7. Tell a Story
						</h2>
						<p>
							People love stories. Use storytelling techniques to
							make your content more engaging and relatable. Share
							personal experiences, case studies, or anecdotes to
							illustrate your points.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							8. Edit and Proofread
						</h2>
						<p>
							Always edit and proofread your work before
							publishing. Check for grammar and spelling errors,
							and ensure your writing flows smoothly. Tools like
							Grammarly and Hemingway can help you polish your
							content.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							9. Engage with Your Readers
						</h2>
						<p>
							Encourage reader interaction by asking questions,
							inviting comments, and responding to feedback.
							Building a community around your content can lead to
							loyal followers and increased engagement.
						</p>
					</section>

					<section class="mb-6">
						<h2 class="text-3xl font-semibold mb-3">
							10. Keep Learning and Improving
						</h2>
						<p>
							The digital landscape is constantly evolving, so
							stay updated with the latest trends and best
							practices in online writing. Read other blogs, take
							online courses, and continually refine your skills.
						</p>
					</section>

					<section>
						<h2 class="text-3xl font-semibold mb-3">Conclusion</h2>
						<p>
							Mastering online writing takes time and practice,
							but with these tips, you'll be well on your way to
							creating compelling content that resonates with your
							audience. Remember to stay true to your voice, be
							authentic, and most importantly, enjoy the process.
							Happy writing!
						</p>
					</section>
				</main>
			</div>
		</div>
	</section>

	<div
		v-show="showButton"
		@click="scrollToTop"
		class="fixed bottom-10 right-10 bg-secondary text-white rounded-full p-2 cursor-pointer"
	>
		<ArrowUpIcon class="size-10" />
	</div>
</template>
