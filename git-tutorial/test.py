
message = "not yet calculated"
count = 0

while count <= 33:
    if count == 0:
        print(str(count) + ": zero")
    elif count%15 == 0:
        print(str(count) + ": fizz-buzz")
    else:
        if count%5 == 0:
            print(str(count) + ": buzz")
        elif count%3 ==0:
            print(str(count) + ": fizz")
        else:
            print(str(count) + ": ")

    count += 1