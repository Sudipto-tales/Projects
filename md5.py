def msg_padding(message):
    message_bytes = bytearray(message, 'utf-8')
    
    org_len = len(message_bytes) * 8
    message_bytes.append(0x80)
    
    while (len(message_bytes) * 8) % 512 != 448:
        message_bytes.append(0)
    
    for i in range(8):
        message_bytes.append((org_len >> (i * 8)) & 0xFF)
    
    return message_bytes


def initialize_md5_variables():
    A = 0x67452301
    B = 0xEFCDAB89
    C = 0x98BADCFE
    D = 0x10325476

    # Per-round shift amounts
    s = [
        7, 12, 17, 22,  7, 12, 17, 22,  7, 12, 17, 22,  7, 12, 17, 22,
        5,  9, 14, 20,  5,  9, 14, 20,  5,  9, 14, 20,  5,  9, 14, 20,
        4, 11, 16, 23,  4, 11, 16, 23,  4, 11, 16, 23,  4, 11, 16, 23,
        6, 10, 15, 21,  6, 10, 15, 21,  6, 10, 15, 21,  6, 10, 15, 21,
    ]
    return A, B, C, D, s


def md5_transform(A, B, C, D, block, s):
    K = [
        0xd76aa478, 0xe8c7b756, 0x242070db, 0xc1bdceee, 0xf57c0faf, 0x4787c62a,
        0xa8304613, 0xfd469501, 0x698098d8, 0x8b44f7af, 0xffff5bb1, 0x895cd7be,
        0x6b901122, 0xfd987193, 0xa679438e, 0x49b40821, 0xf61e2562, 0xc040b340,
        0x265e5a51, 0xe9b6c7aa, 0xd62f105d, 0x02441453, 0xd8a1e681, 0xe7d3fbc8,
        0x21e1cde6, 0xc33707d6, 0xf4d50d87, 0x455a14ed, 0xa9e3e905, 0xfcefa3f8,
        0x676f02d9, 0x8d2a4c8a, 0xfffa3942, 0x8771f681, 0x6d9d6122, 0xfde5380c,
        0xa4beea44, 0x4bdecfa9, 0xf6bb4b60, 0xbebfbc70, 0x289b7ec6, 0xeaa127fa,
        0xd4ef3085, 0x04881d05, 0xd9d4d039, 0xe6db99e5, 0x1fa27cf8, 0xc4ac5665,
        0xf4292244, 0x432aff97, 0xab9423a7, 0xfc93a039, 0x655b59c3, 0x8f0ccc92,
        0xffeff47d, 0x85845dd1, 0x6fa87e4f, 0xfe2ce6e0, 0xa3014314, 0x4e0811a1,
        0xf7537e82, 0xbd3af235, 0x2ad7d2bb, 0xeb86d391
    ]

    # Convert the 512-bit block into 16 32-bit little-endian words
    M = []
    for i in range(0, 64, 4):
     word = block[i:i+4]
     word_int = int.from_bytes(word, byteorder='little')
     M.append(word_int)


    # Save the original hash values
    AA, BB, CC, DD = A, B, C, D

    for i in range(64):
        if 0 <= i <= 15:
            F = (B & C) | (~B & D)
            g = i
        elif 16 <= i <= 31:
            F = (D & B) | (~D & C)
            g = (5 * i + 1) % 16
        elif 32 <= i <= 47:
            F = B ^ C ^ D
            g = (3 * i + 5) % 16
        elif 48 <= i <= 63:
            F = C ^ (B | ~D)
            g = (7 * i) % 16

        # Perform the transformation
        F = (F + A + K[i] + M[g]) & 0xFFFFFFFF
        A = D
        D = C
        C = B
        B = (B + ((F << s[i]) | (F >> (32 - s[i])))) & 0xFFFFFFFF

    # Update hash values
    A = (A + AA) & 0xFFFFFFFF
    B = (B + BB) & 0xFFFFFFFF
    C = (C + CC) & 0xFFFFFFFF
    D = (D + DD) & 0xFFFFFFFF

    return A, B, C, D

def md5(message):
    preprocessed_message = msg_padding(message)
    A, B, C, D, s = initialize_md5_variables()

    for i in range(0, len(preprocessed_message), 64):
        block = preprocessed_message[i:i + 64]
        A, B, C, D = md5_transform(A, B, C, D, block, s)

    final_hash = (A.to_bytes(4, byteorder='little') +
                  B.to_bytes(4, byteorder='little') +
                  C.to_bytes(4, byteorder='little') +
                  D.to_bytes(4, byteorder='little')).hex()
    return final_hash 

# Testing with "2003"
# hash_result = md5("2003")
# print("MD5 hash of '2003':", hash_result)



