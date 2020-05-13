<?php
/* Dado un conjunto de posts de usuarios $text, consulta a IBM personality-insights para obtener los valores de OCEAN */

function obtenerOCEANconIBM($text, $contentLanguage){
	
	$url = "https://gateway.watsonplatform.net/personality-insights/api/v3/profile?version=2018-06-12";
	$username = "YOUR_USER_NAME";
	$password = "YOUR_PASSWORD"; 
	
	$text = preg_replace( "/\r|\n/", "", $text );	// para sacar los saltos de lineas del string.
		
	// create curl resource 
    $ch = curl_init(); 
      
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_FILETIME, TRUE);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	
	curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password); // IBM credentials.
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$header = array('Content-Type: text/html;charset=utf-8','Content-Language:' . $contentLanguage, 'Accept-Language:' . $contentLanguage, 'Content-Length:'. strlen($text));  
	
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $text);
	
    // $output contains the output string
	return $output = curl_exec($ch);
}
	
/*
		******* Example of IBM personality-insights response in JSON format *************
	
	{
		"word_count":22213,
		"processed_language":"en",
		"personality":
		[
			{
				"trait_id":"big5_openness",
				"name":"Openness",
				"category":"personality",
				"percentile":0.11169855066541562,
				"significant":true,
				"children":
				[
					{
						"trait_id":"facet_adventurousness",
						"name":"Adventurousness",
						"category":"personality",
						"percentile":0.3213599547401742,
						"significant":true
					},
					{
						"trait_id":"facet_artistic_interests",
						"name":"Artistic interests",
						"category":"personality",
						"percentile":0.6024254382933374,
						"significant":true
					},
					{
						"trait_id":"facet_emotionality",
----					"name":"Emotionality",
						"category":"personality",
						"percentile":0.2520410891186797,
						"significant":true
					},
					{
						"trait_id":"facet_imagination",
						"name":"Imagination",
						"category":"personality",
						"percentile":0.601467717636736,
						"significant":true
					},
					{
						"trait_id":"facet_intellect",
						"name":"Intellect",
						"category":"personality",
						"percentile":0.7275441301107517,
						"significant":true
					},
					{
						"trait_id":"facet_liberalism",
>>>>					"name":"Authority-challenging",
						"category":"personality",
						"percentile":0.46845882377988024,
						"significant":true
					}
				]
			},
			{
				"trait_id":"big5_conscientiousness",
				"name":"Conscientiousness",
				"category":"personality",
				"percentile":0.4319841257420043,
				"significant":true,"children":
				[
					{
						"trait_id":"facet_achievement_striving",
						"name":"Achievement striving",
						"category":"personality",
						"percentile":0.3536602473582754,
						"significant":true
					},
					{
						"trait_id":"facet_cautiousness",
						"name":"Cautiousness",
						"category":"personality",
						"percentile":0.3578127338972092,
						"significant":true
					},
					{
						"trait_id":"facet_dutifulness",
						"name":"Dutifulness",
						"category":"personality",
						"percentile":0.5674125854015791,
						"significant":true
					},
					{
						"trait_id":"facet_orderliness",
						"name":"Orderliness",
						"category":"personality",
						"percentile":0.7095505344173363,
						"significant":true
					},
					{
						"trait_id":"facet_self_discipline",
						"name":"Self-discipline",
						"category":"personality",
						"percentile":0.39324426972447596,
						"significant":true
					},
					{
						"trait_id":"facet_self_efficacy",
						"name":"Self-efficacy",
						"category":"personality",
						"percentile":0.7311357952211214,
						"significant":true
					}
				]
			},
			{
				"trait_id":"big5_extraversion",
				"name":"Extraversion",
				"category":"personality",
				"percentile":0.23961804182202584,
				"significant":true,
				"children":
				[
					{
						"trait_id":"facet_activity_level",
						"name":"Activity level",
						"category":"personality",
						"percentile":0.5702554486385597,
						"significant":true
					},
					{
						"trait_id":"facet_assertiveness",
						"name":"Assertiveness",
						"category":"personality",
						"percentile":0.8605561582043834,
						"significant":true
					},
					{
						"trait_id":"facet_cheerfulness",
						"name":"Cheerfulness",
						"category":"personality",
						"percentile":0.2768196616364341,
						"significant":true
					},
					{
						"trait_id":"facet_excitement_seeking",
						"name":"Excitement-seeking",
						"category":"personality",
						"percentile":0.9225464686051237,
						"significant":true
					},
					{
						"trait_id":"facet_friendliness",
>>>>					"name":"Outgoing",
						"category":"personality",
						"percentile":0.3153321523427402,
						"significant":true
					},
					{
						"trait_id":"facet_gregariousness",
						"name":"Gregariousness",
						"category":"personality",
						"percentile":0.5297919730529767,
						"significant":true
					}
				]
			},
			{
				"trait_id":"big5_agreeableness",
				"name":"Agreeableness",
				"category":"personality",
				"percentile":0.3311578399807472,
				"significant":true,
				"children":
				[
					{
						"trait_id":"facet_altruism",
						"name":"Altruism",
						"category":"personality",
						"percentile":0.5204012795798576,
						"significant":true
					},
					{
						"trait_id":"facet_cooperation",
						"name":"Cooperation",
						"category":"personality",
						"percentile":0.06300145986250222,
						"significant":true
					},
					{
						"trait_id":"facet_modesty",
						"name":"Modesty",
						"category":"personality",
						"percentile":0.6094294260747193,
						"significant":true
					},
					{
						"trait_id":"facet_morality",
>>>>					"name":"Uncompromising",
						"category":"personality",
						"percentile":0.3120262422025647,
						"significant":true
					},
					{
						"trait_id":"facet_sympathy",
----					"name":"Sympathy",
						"category":"personality",
						"percentile":0.7206877396401661,
						"significant":true
					},
					{
						"trait_id":"facet_trust",
----					"name":"Trust",
						"category":"personality",
						"percentile":0.21071015442449276,
						"significant":true
					}
				]
			},
			{
				"trait_id":"big5_neuroticism",
				"name":"Emotional range",
				"category":"personality",
				"percentile":0.6677119945723681,
				"significant":true,"children":
				[
					{
						"trait_id":"facet_anger",
>>>>					"name":"Fiery",
						"category":"personality",
						"percentile":0.562010243727209,
						"significant":true
					},
					{
						"trait_id":"facet_anxiety",
>>>>					"name":"Prone to worry",
						"category":"personality",
						"percentile":0.6287064698957723,
						"significant":true
					},
					{
						"trait_id":"facet_depression",
>>>>					"name":"Melancholy",
						"category":"personality",
						"percentile":0.7609265165742249,
						"significant":true
					},
					{
						"trait_id":"facet_immoderation",
----					"name":"Immoderation",
						"category":"personality",
						"percentile":0.011852206269020005,
						"significant":true
					},
					{
						"trait_id":"facet_self_consciousness",
						"name":"Self-consciousness",
						"category":"personality",
						"percentile":0.6630225834303668,
						"significant":true
					},
					{
						"trait_id":"facet_vulnerability",
>>>>					"name":"Susceptible to stress",
						"category":"personality",
						"percentile":0.6124319611969089,
						"significant":true
					}
				]
			}
		],"needs":[{"trait_id":"need_challenge","name":"Challenge","category":"needs","percentile":0.4474716470417058,"significant":true},{"trait_id":"need_closeness","name":"Closeness","category":"needs","percentile":0.49762884656588624,"significant":true},{"trait_id":"need_curiosity","name":"Curiosity","category":"needs","percentile":0.7847049951250804,"significant":true},{"trait_id":"need_excitement","name":"Excitement","category":"needs","percentile":0.5159475698525279,"significant":true},{"trait_id":"need_harmony","name":"Harmony","category":"needs","percentile":0.4664580159686184,"significant":true},{"trait_id":"need_ideal","name":"Ideal","category":"needs","percentile":0.6532384087179506,"significant":true},{"trait_id":"need_liberty","name":"Liberty","category":"needs","percentile":0.8019551768586917,"significant":true},{"trait_id":"need_love","name":"Love","category":"needs","percentile":0.39367207634117707,"significant":true},{"trait_id":"need_practicality","name":"Practicality","category":"needs","percentile":0.5212109928924955,"significant":true},{"trait_id":"need_self_expression","name":"Self-expression","category":"needs","percentile":0.6923378223514587,"significant":true},{"trait_id":"need_stability","name":"Stability","category":"needs","percentile":0.4975239637663312,"significant":true},{"trait_id":"need_structure","name":"Structure","category":"needs","percentile":0.800020795210123,"significant":true}],"values":[{"trait_id":"value_conservation","name":"Conservation","category":"values","percentile":0.3111120859692681,"significant":true},{"trait_id":"value_openness_to_change","name":"Openness to change","category":"values","percentile":0.5528141988163324,"significant":true},{"trait_id":"value_hedonism","name":"Hedonism","category":"values","percentile":0.6659020791801358,"significant":true},{"trait_id":"value_self_enhancement","name":"Self-enhancement","category":"values","percentile":0.40275060596645346,"significant":true},{"trait_id":"value_self_transcendence","name":"Self-transcendence","category":"values","percentile":0.5186185570214256,"significant":true}],"warnings":[{"warning_id":"CONTENT_TRUNCATED","message":"For maximum accuracy while also optimizing processing time, only the first 250KB of input text (excluding markup) was analyzed. Accuracy levels off at approximately 3,000 words so this did not affect the accuracy of the profile."}]}
	
	*/
	
	
	
	/*

	<<<  este json tiene warning que es poco el contenido, y al parecer eso hace que no clasifique en terminos sino en las dimensiones principales
	$JSONtext = "
		 {
			 "word_count":498,
			 "word_count_message":"There were 498 words in the input. We need a minimum of 600, preferably 1,200 or more, to compute statistically significant estimates",
			 "processed_language":"en",
			 "personality":
			[
				{
					"trait_id":"big5_openness",
					"name":"Openness",
					"category":"personality",
					"percentile":0.9996445139464818,
					"significant":true,
					"children":
					[
						{
							"trait_id":"facet_adventurousness",
							"name":"Adventurousness",
							"category":"personality",
							"percentile":0.03432089827663398,
							"significant":true
						},
						{
							"trait_id":"facet_artistic_interests",
							"name":"Artistic interests",
							"category":"personality",
							"percentile":0.9986331807809645,
							"significant":true
						},
						{
							"trait_id":"facet_emotionality",
							"name":"Emotionality",
							"category":"personality",
							"percentile":0.7161049953935299,
							"significant":true
						},
						{
							"trait_id":"facet_imagination",
							"name":"Imagination",
							"category":"personality",
							"percentile":0.7922938104351903,
							"significant":true
						},
						{
							"trait_id":"facet_intellect",
							"name":"Intellect",
							"category":"personality",
							"percentile":0.9493398594046075,
							"significant":true
						},
						{
							"trait_id":"facet_liberalism",
							"name":"Authority-challenging",
							"category":"personality",
							"percentile":0.5925338290332711,
							"significant":true
						}
					]
				},
				{
					"trait_id":"big5_conscientiousness",
					"name":"Conscientiousness",
					"category":"personality",
					"percentile":0.3855478829066961,"significant":true,"children":
					[
						{
							"trait_id":"facet_achievement_striving",
							"name":"Achievement striving",
							"category":"personality",
							"percentile":0.38580511497401604,
							"significant":true
						},
						{
							"trait_id":"facet_cautiousness",
							"name":"Cautiousness",
							"category":"personality",
							"percentile":0.9647888138611904,
							"significant":true
						},
						{
							"trait_id":"facet_dutifulness",
							"name":"Dutifulness",
							"category":"personality",
							"percentile":0.6472673731065524,
							"significant":true
						},
						{
							"trait_id":"facet_orderliness",
							"name":"Orderliness",
							"category":"personality",
							"percentile":0.99777037867571,
							"significant":true
						},
						{
							"trait_id":"facet_self_discipline",
							"name":"Self-discipline",
							"category":"personality",
							"percentile":0.7653386213248148,
							"significant":true
						},
						{
							"trait_id":"facet_self_efficacy",
							"name":"Self-efficacy",
							"category":"personality",
							"percentile":0.461026963888439,
							"significant":true
						}
					]
				},
				{
					"trait_id":"big5_extraversion",
					"name":"Extraversion",
					"category":"personality",
					"percentile":0.8177302370354513,"significant":true,"children":
					[
						{
							"trait_id":"facet_activity_level",
							"name":"Activity level",
							"category":"personality",
							"percentile":0.14348797782587663,
							"significant":true
						},
						{
							"trait_id":"facet_assertiveness",
							"name":"Assertiveness",
							"category":"personality",
							"percentile":0.1255192594544718,
							"significant":true
						},
						{
							"trait_id":"facet_cheerfulness",
							"name":"Cheerfulness",
							"category":"personality",
							"percentile":0.5968079865173818,
							"significant":true
						},
						{
							"trait_id":"facet_excitement_seeking",
							"name":"Excitement-seeking",
							"category":"personality",
							"percentile":0.29600438276610797,
							"significant":true
						},
						{
							"trait_id":"facet_friendliness",
							"name":"Outgoing",
							"category":"personality",
							"percentile":0.33106129439087856,
							"significant":true
						},
						{
							"trait_id":"facet_gregariousness",
							"name":"Gregariousness",
							"category":"personality",
							"percentile":0.18885189021519377,
							"significant":true
						}
					]
				},
				{
					"trait_id":"big5_agreeableness",
					"name":"Agreeableness",
					"category":"personality",
					"percentile":0.15921894869106423,
					"significant":true,"children":
					[
						{
							"trait_id":"facet_altruism",
							"name":"Altruism",
							"category":"personality",
							"percentile":0.3850178913050902,
							"significant":true
						},
						{
							"trait_id":"facet_cooperation",
							"name":"Cooperation",
							"category":"personality",
							"percentile":0.7928245614354217,
							"significant":true
						},
						{
							"trait_id":"facet_modesty",
							"name":"Modesty",
							"category":"personality",
							"percentile":0.4996608484476748,
							"significant":true
						},
						{
							"trait_id":"facet_morality",
							"name":"Uncompromising",
							"category":"personality",
							"percentile":0.39012395781242626,
							"significant":true
						},
						{
							"trait_id":"facet_sympathy",
							"name":"Sympathy",
							"category":"personality",
							"percentile":0.5532401514129214,
							"significant":true
						},
						{
							"trait_id":"facet_trust",
							"name":"Trust",
							"category":"personality",
							"percentile":0.3087469511628389,"significant":true
						}
					]
				},
				{
					"trait_id":"big5_neuroticism",
					"name":"Emotional range",
					"category":"personality",
					"percentile":0.7505023128983708,
					"significant":true,
					"children":
					[
						{
							"trait_id":"facet_anger",
							"name":"Fiery",
							"category":"personality",
							"percentile":0.28363846789821356,
							"significant":true
						},
						{
							"trait_id":"facet_anxiety",
							"name":"Prone to worry",
							"category":"personality",
							"percentile":0.5760456441933388,
							"significant":true
						},
						{
							"trait_id":"facet_depression",
							"name":"Melancholy",
							"category":"personality",
							"percentile":0.32615372475789667,
							"significant":true
						},
						{
							"trait_id":"facet_immoderation",
							"name":"Immoderation",
							"category":"personality",
							"percentile":0.2769130164616215,
							"significant":true
						},
						{
							"trait_id":"facet_self_consciousness",
							"name":"Self-consciousness",
							"category":"personality",
							"percentile":0.22623250445888848,
							"significant":true
						},
						{
							"trait_id":"facet_vulnerability",
							"name":"Susceptible to stress",
							"category":"personality",
							"percentile":0.42405004121277773,
							"significant":true
						}
					]
				}
			],
			"needs":[{"trait_id":"need_challenge","name":"Challenge","category":"needs","percentile":0.0011019671544452714,"significant":true},{"trait_id":"need_closeness","name":"Closeness","category":"needs","percentile":0.5530363769004568,"significant":true},{"trait_id":"need_curiosity","name":"Curiosity","category":"needs","percentile":0.3374754761697554,"significant":true},{"trait_id":"need_excitement","name":"Excitement","category":"needs","percentile":0.12436991036314543,"significant":true},{"trait_id":"need_harmony","name":"Harmony","category":"needs","percentile":0.7417202609602478,"significant":true},{"trait_id":"need_ideal","name":"Ideal","category":"needs","percentile":0.06466083358712621,"significant":true},{"trait_id":"need_liberty","name":"Liberty","category":"needs","percentile":0.07792032274164606,"significant":true},{"trait_id":"need_love","name":"Love","category":"needs","percentile":0.7553836951914414,"significant":true},{"trait_id":"need_practicality","name":"Practicality","category":"needs","percentile":0.09411811697870753,"significant":true},{"trait_id":"need_self_expression","name":"Self-expression","category":"needs","percentile":0.661663257950698,"significant":true},{"trait_id":"need_stability","name":"Stability","category":"needs","percentile":0.570373278152404,"significant":true},{"trait_id":"need_structure","name":"Structure","category":"needs","percentile":0.011952077530889504,"significant":true}],"values":[{"trait_id":"value_conservation","name":"Conservation","category":"values","percentile":0.08940163343534935,"significant":true},{"trait_id":"value_openness_to_change","name":"Openness to change","category":"values","percentile":0.6683258915483239,"significant":true},{"trait_id":"value_hedonism","name":"Hedonism","category":"values","percentile":0.2174907852011661,"significant":true},{"trait_id":"value_self_enhancement","name":"Self-enhancement","category":"values","percentile":0.13564500695475346,"significant":true},{"trait_id":"value_self_transcendence","name":"Self-transcendence","category":"values","percentile":0.1767237693206266,"significant":true}],"warnings":[{"warning_id":"WORD_COUNT_MESSAGE","message":"There were 498 words in the input. We need a minimum of 600, preferably 1,200 or more, to compute statistically significant estimates"}]}		
	";*/
	
?>