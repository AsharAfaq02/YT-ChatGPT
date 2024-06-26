from youtube_transcript_api import YouTubeTranscriptApi
from openai import OpenAI
import json
from pprint import pprint
import re
file = open('info.json')

data = json.load(file)

video_id = str(json.dumps(data["video_id"]))

prompt = str(json.dumps(data["prompt"]))

video_id = video_id.replace('"', '')

prompt = prompt.replace('"', '')

transcript = YouTubeTranscriptApi.get_transcript(video_id, languages=['en']) 

transcript_string = ''

# iterate over all available transcripts

for text in transcript:

    filtered_text = list(text.values())[0]

    transcript_string = transcript_string + filtered_text + ' '

prompt_string = prompt + " Now, use the following data to answer the prompt: " + transcript_string

client = OpenAI()

completion = client.chat.completions.create(

  model="gpt-3.5-turbo",

  messages=[

    {"role": "system", "content": "Accurate and knowledgeable in all things. "},

    {"role": "user", "content": prompt_string},

  ]

)

chat_response = list(completion.choices[0].message)[0][1]

with open("prompt_output.json", "w") as file:

    file.truncate()

    file.write(json.dumps(chat_response, ensure_ascii=False))

    
