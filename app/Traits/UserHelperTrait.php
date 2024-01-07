<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Profile;
use App\Models\User;

/**
 * Trait UserHelperTrait
 */
trait UserHelperTrait
{
    /**
     * Get current authenticated user
     */
    public function authUser(): ?User
    {
        return request()->user();
    }

    /**
     * Return current authenticated user's profile
     */
    public function authProfile(): ?Profile
    {
        return request()->user()?->profile;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authContact()
    {
        return $this->authProfile()?->contact;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authSummary()
    {
        return $this->authProfile()?->summary;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authWorkExperiences()
    {
        return $this->authProfile()?->work_experiences;
    }

    public function authWorkExperience(int $id)
    {
        return $this->authProfile()?->work_experiences()?->find($id);
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authEducations($id = null)
    {
        $profile = $this->authProfile();

        if (! $profile) {
            return null;
        }

        if ($id && $profile) {
            return $profile->educations()->find($id);
        }

        return $profile->educations;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authSkills($id = null)
    {
        $profile = $this->authProfile();

        if (! $profile) {
            return null;
        }

        if ($id && $profile) {
            return $profile->skills()->find($id);
        }

        return $profile->skills;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authSocials($id = null)
    {
        $profile = $this->authProfile();

        if (! $profile) {
            return null;
        }

        if ($id && $profile) {
            return $profile->socials()->find($id);
        }

        return $profile->socials;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authCoreValues($id = null)
    {
        $profile = $this->authProfile();

        if (! $profile) {
            return null;
        }

        if ($id && $profile) {
            return $profile->core_values()->find($id);
        }

        return $profile->core_values;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authPortfolios($id = null)
    {
        $profile = $this->authProfile();

        if (! $profile) {
            return null;
        }

        if ($id && $profile) {
            return $profile->portfolios()->find($id);
        }

        return $profile->portfolios;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authInterests($id = null)
    {
        $profile = $this->authProfile();

        if (! $profile) {
            return null;
        }

        if ($id && $profile) {
            return $profile->interests()->find($id);
        }

        return $profile->interests;
    }
}
