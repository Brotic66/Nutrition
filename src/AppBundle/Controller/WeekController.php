<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Day;
use AppBundle\Entity\Week;
use AppBundle\Form\Type\WeekType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Week controller.
 *
 * @Route("week")
 */
class WeekController extends Controller
{
    /**
     * Show EDT controller.
     *
     * @param Request $request Request service from Symfony.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/show-pdt", name="week_show_pdt")
     * @Method("GET")
     */
    public function showTime(Request $request)
    {
        $weeks = $this->getDoctrine()->getManager()->getRepository('AppBundle:Week')->findAll();

        return $this->render('week/showEDT.html.twig', array(
            'weeks' => $weeks,
        ));
    }


    /**
     * Lists all week entities.
     *
     * @Route("/", name="week_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $weeks = $em->getRepository('AppBundle:Week')->findAll();

        return $this->render('week/index.html.twig', array(
            'weeks' => $weeks,
        ));
    }

    /**
     * Creates a new week entity.
     *
     * @Route("/new", name="week_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $week = $this->get('nutrition.week_manager')->getWeekWithBaseDays();
        $form = $this->createForm(WeekType::class, $week);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($week);
            $em->flush($week);

            return $this->redirectToRoute('week_show', array('id' => $week->getId()));
        }

        return $this->render('week/new.html.twig', array(
            'week' => $week,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a week entity.
     *
     * @Route("/{id}", name="week_show")
     * @Method("GET")
     */
    public function showAction(Week $week)
    {
        $deleteForm = $this->createDeleteForm($week);

        return $this->render('week/show.html.twig', array(
            'week' => $week,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing week entity.
     *
     * @Route("/{id}/edit", name="week_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Week $week)
    {
        $deleteForm = $this->createDeleteForm($week);
        $editForm = $this->createForm(WeekType::class, $week);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('week_edit', array('id' => $week->getId()));
        }

        return $this->render('week/edit.html.twig', array(
            'week' => $week,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a week entity.
     *
     * @Route("/{id}", name="week_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Week $week)
    {
        $form = $this->createDeleteForm($week);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($week);
            $em->flush($week);
        }

        return $this->redirectToRoute('week_index');
    }

    /**
     * Creates a form to delete a week entity.
     *
     * @param Week $week The week entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Week $week)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('week_delete', array('id' => $week->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
