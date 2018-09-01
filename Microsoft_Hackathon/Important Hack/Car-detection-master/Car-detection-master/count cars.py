import os
import logging
import logging.handlers
import random
import python_utils
import numpy as np
import skvideo.io
import cv2
import matplotlib.pyplot as plt

import utils
# without this some strange errors happen
cv2.ocl.setUseOpenCL(False)
random.seed(123)

# ============================================================================
IMAGE_DIR = "./out"
VIDEO_SOURCE = "video.mp4"
SHAPE = (720, 1280)  # HxW
# ============================================================================


def train_bg_subtractor(inst, cap, num=500):
    '''
        BG substractor need process some amount of frames to start giving result
    '''
    print ('Training BG Subtractor...')
    i = 0
    for frame in cap:
        inst.apply(frame, None, 0.001)
        i += 1
        if i >= num:
            return cap


def main():
    log = logging.getLogger("main")

    # creting MOG bg subtractor with 500 frames in cache
    # and shadow detction
    bg_subtractor = cv2.createBackgroundSubtractorMOG2(
        history=500, detectShadows=True)

    # Set up image source
    # You can use also CV2, for some reason it not working for me
    cap = skvideo.io.vreader(VIDEO_SOURCE)

    # skipping 500 frames to train bg subtractor
    train_bg_subtractor(bg_subtractor, cap, num=500)

    frame_number = -1
    for frame in cap:
        if not frame.any():
            log.error("Frame capture failed, stopping...")
            break

        frame_number += 1

        utils.save_frame(frame, "./out/frame_%04d.png" % frame_number)

        fg_mask = bg_subtractor.apply(frame, None, 0.001)
        
        utils.save_frame(frame, "./out/fg_mask_%04d.png" % frame_number)

# ============================================================================

if __name__ == "__main__":
    log = utils.init_logging()

    if not os.path.exists(IMAGE_DIR):
        log.debug("Creating image directory `%s`...", IMAGE_DIR)
        os.makedirs(IMAGE_DIR)

    main()
