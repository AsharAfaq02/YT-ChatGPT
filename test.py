import json
from pprint import pprint

file = open('info.json')

data = json.load(file)
video_id = json.dumps(data["video_id"])
prompt = json.dumps(data["prompt"])

print(video_id)